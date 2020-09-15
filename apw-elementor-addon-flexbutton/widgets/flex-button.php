<?php
namespace ApwWebSite;

use Elementor\Repeater;
use Elementor\Widget_Base;

class FlexButton_Widget extends Widget_Base {

	public static $slug = 'apw-elementor-addon-flexbutton';

	public function get_name() { return self::$slug; }

	public function get_title() { return __('Гибкие кнопки', self::$slug); }

	public function get_icon() { return 'eicon-button'; }

	public function get_categories() { return [ 'first-category' ]; }
  
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Контент', 'apw-elementor-addon-flexbutton' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$this->add_control(
			'text_button', [
				'label' => __( 'Заголовок', 'apw-elementor-addon-flexbutton' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Ссылка' , 'apw-elementor-addon-flexbutton' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_button',
			[
				'label' => __( 'Ссылка', 'apw-elementor-addon-flexbutton' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Введите ссылку', 'apw-elementor-addon-flexbutton' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->end_controls_section();
	} 
	protected function render() {
		$settings = $this->get_settings_for_display();
		$text_button = $settings['text_button'];
		$target = $settings['link_button']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link_button']['nofollow'] ? ' rel="nofollow"' : '';

		echo '<a class="flex_button" href="' . $settings['link_button']['url'] . '"' . $target . $nofollow . '>'.$text_button.'</a>';
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			?>
			<script src="<?php echo plugins_url('apw-elementor-addon-flexbutton');?>/inc/script.js"></script>

			<?
		}else{

		}
	}
	protected function _content_template() {
		?>
		<#	
			var target = settings.link_button.is_external ? ' target="_blank"' : '';
			var nofollow = settings.link_button.nofollow ? ' rel="nofollow"' : '';
		#>
			<a class="flex_button" href="{{ settings.link_button.url }}"{{ target }}{{ nofollow }}>{{ settings.text_button }}</a>
		<?php
	}
}