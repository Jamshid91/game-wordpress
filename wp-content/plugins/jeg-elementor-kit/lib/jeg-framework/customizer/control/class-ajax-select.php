<?php
/**
 * Customizer Control: kirki-select.
 *
 * @author Jegstudio
 * @since 1.0.0
 * @package jeg-framework
 */
namespace Jeg\Customizer\Control;

/**
 * Select control.
 */
class Ajax_Select extends Control_Abstract {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'jeg-ajax-select';

	/**
	 * Maximum number of options the user will be able to select.
	 * Set to 1 for single-select.
	 *
	 * @access public
	 * @var int
	 */
	public $multiple = 1;

	/**
	 * @var string
	 */
	public $ajax_action;

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 */
	public function to_json() {
		parent::to_json();
		$this->json['multiple']    = $this->multiple;
		$this->json['ajax_action'] = $this->ajax_action;
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<# if ( ! data.choices ) return; #>
		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<select {{{ data.link }}} data-multiple="{{ data.multiple }}"<# if ( 1 < data.multiple ) { #> multiple<# } #> data-action="{{{ data.ajax_action }}}">
				<# if ( 1 < data.multiple && data.value ) { #>
					<# for ( key in data.value ) { #>
						<option value="{{ data.value[ key ] }}" selected>{{ data.choices[ data.value[ key ] ] }}</option>
					<# } #>
					<# for ( key in data.choices ) { #>
						<# if ( data.value[ key ] in data.value ) { #>
						<# } else { #>
							<option value="{{ key }}">{{ data.choices[ key ] }}</option>
						<# } #>
					<# } #>
				<# } else { #>
					<# for ( key in data.choices ) { #>
						<option value="{{ key }}"<# if ( key === data.value ) { #>selected<# } #>>{{ data.choices[ key ] }}</option>
					<# } #>
				<# } #>
			</select>
		</label>
		<?php
	}
}
