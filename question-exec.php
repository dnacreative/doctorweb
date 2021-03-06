<?php
	use LeanCloud\LeanObject;
	use LeanCloud\LeanQuery;
    use LeanCloud\GeoPoint;
	use LeanCloud\LeanClient;
	use LeanCloud\CloudException;

	require_once("autoload.php");
	require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz","xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");
	$iOrder = (int)$_POST['iOrder'];
	$iChapter = (int)$_POST['iChapter'];
	$title = $_POST['title'];
	$option = $_POST['option'];
	$sAnswer = $_POST['sAnswer'];
	$attr = (int)$_POST['singlechoice'];

    $query = new LeanQuery("question");
    $query->equalTo("iOrder", $iOrder);
    $objects = $query->find();

    forEach($objects as $obj) {
        if ($obj instanceof LeanObject) {
          	$obj->set(QUESTION_CHAPTER, $iChapter);
          	$obj->set(QUESTION_OPTION, $option);
          	$obj->set(QUESTION_ANSWER, $sAnswer);
          	$obj->set(QUESTION_ATTR, $attr);
          	$obj->set(QUESTION_TITLE, $title);//
          	$obj->set(QUESTION_PICTURE, $title);//
          	$obj->set(QUESTION_DETAILANALYSIS, $title);
          	$obj->set(QUESTION_ORDER, $iOrder);
          	$obj->save();
        }
    }

?>
