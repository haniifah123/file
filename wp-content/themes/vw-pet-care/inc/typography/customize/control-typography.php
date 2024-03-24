<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Pet_Care_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'vw-pet-care-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-pet-care' ),
				'family'      => esc_html__( 'Font Family', 'vw-pet-care' ),
				'size'        => esc_html__( 'Font Size',   'vw-pet-care' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-pet-care' ),
				'style'       => esc_html__( 'Font Style',  'vw-pet-care' ),
				'line_height' => esc_html__( 'Line Height', 'vw-pet-care' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-pet-care' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-pet-care-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-pet-care-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-pet-care' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-pet-care' ),
        'Acme' => __( 'Acme', 'vw-pet-care' ),
        'Anton' => __( 'Anton', 'vw-pet-care' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-pet-care' ),
        'Arimo' => __( 'Arimo', 'vw-pet-care' ),
        'Arsenal' => __( 'Arsenal', 'vw-pet-care' ),
        'Arvo' => __( 'Arvo', 'vw-pet-care' ),
        'Alegreya' => __( 'Alegreya', 'vw-pet-care' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-pet-care' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-pet-care' ),
        'Bangers' => __( 'Bangers', 'vw-pet-care' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-pet-care' ),
        'Bad Script' => __( 'Bad Script', 'vw-pet-care' ),
        'Bitter' => __( 'Bitter', 'vw-pet-care' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-pet-care' ),
        'BenchNine' => __( 'BenchNine', 'vw-pet-care' ),
        'Cabin' => __( 'Cabin', 'vw-pet-care' ),
        'Cardo' => __( 'Cardo', 'vw-pet-care' ),
        'Courgette' => __( 'Courgette', 'vw-pet-care' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-pet-care' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-pet-care' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-pet-care' ),
        'Cuprum' => __( 'Cuprum', 'vw-pet-care' ),
        'Cookie' => __( 'Cookie', 'vw-pet-care' ),
        'Chewy' => __( 'Chewy', 'vw-pet-care' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-pet-care' ),
			'100' => esc_html__( 'Thin',       'vw-pet-care' ),
			'300' => esc_html__( 'Light',      'vw-pet-care' ),
			'400' => esc_html__( 'Normal',     'vw-pet-care' ),
			'500' => esc_html__( 'Medium',     'vw-pet-care' ),
			'700' => esc_html__( 'Bold',       'vw-pet-care' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-pet-care' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-pet-care' ),
			'normal'  => esc_html__( 'Normal', 'vw-pet-care' ),
			'italic'  => esc_html__( 'Italic', 'vw-pet-care' ),
			'oblique' => esc_html__( 'Oblique', 'vw-pet-care' )
		);
	}
}
