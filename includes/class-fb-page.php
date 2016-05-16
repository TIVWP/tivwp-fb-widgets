<?php
/**
 * File: class-fb-page.php
 *
 * @package TIVWP
 */

/**
 * Class TIVWP_FB_Widget_Page
 */
class TIVWP_FB_Widget_Page extends WP_Widget {

	const WIDGET_ID = 'TIVWP_FB_Widget_Page';

	const URL_DOC = 'https://developers.facebook.com/docs/plugins/page-plugin#settings';

	const FIELD_TITLE = 'title';
	const FIELD_SDK = 'sdk';
	const FIELD_PAGE_CODE = 'page-code';

	protected static $default_instance = array(
		self::FIELD_TITLE     => '',
		self::FIELD_SDK       => '',
		self::FIELD_PAGE_CODE => '',
	);

	/**
	 * TIVWP_FB_Widget_Page constructor.
	 */
	public function __construct() {
		$params = array(
			'description' => esc_html__( 'Facebook Social Plugins: Page', 'tivwp-fb-widgets' ),
			'name'        => esc_html__( '[TIVWP] FB Widget: Page Plugin', 'tivwp-fb-widgets' ),
		);
		parent::__construct( self::WIDGET_ID, '', $params );

		add_action( 'widgets_init', array( $this, 'action__widgets_init' ) );

	}

	public function action__widgets_init() {
		register_widget( self::WIDGET_ID );
	}

	/**
	 * Outputs the settings update form.
	 *
	 * @since  2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 *
	 * @return string Default return is 'noform'.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, self::$default_instance );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( self::FIELD_TITLE ); ?>">
				<?php esc_html_e( 'Title', 'tivwp-fb-widgets' ); ?>:
			</label>
			<input
				class="widefat"
				id="<?php echo $this->get_field_id( self::FIELD_TITLE ); ?>"
				name="<?php echo $this->get_field_name( self::FIELD_TITLE ); ?>"
				value="<?php echo esc_attr( $instance[ self::FIELD_TITLE ] ); ?>" />
		</p>

		<p>
			<strong><?php esc_html_e( 'Settings', 'tivwp-fb-widgets' ); ?></strong>
			<a href="<?php echo esc_url( self::URL_DOC ); ?>" target="_blank"
			   title="<?php esc_attr_e( 'Facebook documentation', 'tivwp-fb-widgets' ); ?>">[?]</a>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( self::FIELD_SDK ); ?>">
				<?php esc_html_e( 'Code from Step 2 (SDK)', 'tivwp-fb-widgets' ); ?>:
			</label>
			<textarea
				id="<?php echo $this->get_field_id( self::FIELD_SDK ); ?>"
				name="<?php echo $this->get_field_name( self::FIELD_SDK ); ?>"
				class="widefat"><?php echo esc_textarea( $instance[ self::FIELD_SDK ] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( self::FIELD_PAGE_CODE ); ?>">
				<?php esc_html_e( 'Code from Step 3 (DIV)', 'tivwp-fb-widgets' ); ?>:
			</label>
			<textarea
				id="<?php echo $this->get_field_id( self::FIELD_PAGE_CODE ); ?>"
				name="<?php echo $this->get_field_name( self::FIELD_PAGE_CODE ); ?>"
				class="widefat"><?php echo esc_textarea( $instance[ self::FIELD_PAGE_CODE ] ); ?></textarea>
		</p>

		<?php
		return '';
	}

	/**
	 * Echoes the widget content.
	 *
	 * Sub-classes should over-ride this function to generate their widget code.
	 *
	 * @since  2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance The settings for the particular instance of the widget.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, self::$default_instance );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $instance[ self::FIELD_TITLE ], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( $instance[ self::FIELD_SDK ] ) {
			echo $instance[ self::FIELD_SDK ];
		}

		if ( $instance[ self::FIELD_PAGE_CODE ] ) {
			echo $instance[ self::FIELD_PAGE_CODE ];
		}
		echo $args['after_widget'];

	}

}

/* EOF */
