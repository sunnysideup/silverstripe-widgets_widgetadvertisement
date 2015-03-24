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

	private static $has_many = array();

	private static $many_many = array();

	private static $belongs_many_many = array();

	private static $defaults = array();

	private static $title = '';

	private static $cmsTitle = 'Advertisement';

	private static $description = 'Adds a simple image + link (advertisement) to your widget area.';

	function getCMSFields() {
		$dataSet = File::get()->filter(array("ClassName" => "Title"))->sort("Title");
		$dropDownSource = array(0 => "--- select file from files and images ---") + $dataSet->map()->toArray();
		$fields = new FieldList();
		$fields->push(new TextField("Hyperlink","Hyperlink (e.g. http://www.sunnysideup.co.nz)"));
		$fields->push(new HeaderField("MakeSureToUploadImageFirst","Please make sure image is uploaded first in file and images section", 5));
		$fields->push(new DropdownField("LogoID","Image / Picture / Logo", $dropDownSource));
		return $fields;
	}

	function Data() {
		$dos = new ArrayList();
		$dos->Hyperlink = $this->Hyperlink;
		$dos->Logo = $this->Logo();
		return $dos;
	}

}
