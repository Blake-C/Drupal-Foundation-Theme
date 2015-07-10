<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 *
 * Main row template for repeating section
 * This file uses the get_string_between function located in the utility function includes file
 * The banner has three fileds an image, link, and description (body).
 *
 * Content type for this view has banner_image, banner_link, and banner_body field names
 *
 */
?>

<?php
	$bannerImageTag = $fields['field_banner_image']->content;
	$bannerImageURL = get_string_between($bannerImageTag, 'src="', '" width="');
?>

<div class="slide" data-image="<?php echo $bannerImageURL; ?>">
	<div class="content-container">
		<div class="box">
			<?php print $fields['field_banner_body']->content; ?>
			<a href="<?php print $fields['field_banner_link']->content; ?>">
			<p>Learn More</p>
			</a> 
		</div>
	</div>
</div>

<?php
	// The following line is used with the Theme Developer module
	// https://www.drupal.org/project/devel_themer
	// Displays the fields machine names to get the content to display

	// dpm($fields);
?>