<?php
/**
 *@author nicolaas [at] sunnysideup.co.nz
 */
class WidgetAdvertisement extends Widget {

	private static $db = array(
		"Hyperlink" => "Varchar(255)"
	);

	private static $has_one = array(
		"Logo" => "Image"
	);

	private static $cmsTitle = 'Advertisement';

	private static $description = 'Adds a simple image + link (advertisement) to your widget area.';

	function getCMSFields() {
		$fields = new FieldList();
		$fields->push(new TextField("Hyperlink","Hyperlink (e.g. http://www.silverstripe.co.nz)"));
		$fields->push(new HeaderField("MakeSureToUploadImageFirst","Please make sure image is uploaded first in file and images section", 5));
		$fields->push(new DropdownField("LogoID","Image / Picture / Logo", array(0 => "--- please select ---") + Image::get()->map()->toArray()));
		return $fields;
	}

	function WidgetAdvertisementData() {
		return new ArrayData(
			array(
				"Hyperlink" => $this->Hyperlink,
				"Logo" => $this->Logo()
			)
		);
	}

}
