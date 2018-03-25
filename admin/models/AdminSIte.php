<?php

class admin_banner extends AdminTable {
	public $TABLE = 'banner';
	public $IMG_SIZE = 480; // макс высота
	public $IMG_VSIZE = 144;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1180;
	public $IMG_BIG_VSIZE = 354;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'title';
	public $SORT = 'sort DESC';
	public $RUBS_NO_UNDER = 1;
//    public $FIELD_UNDER         = 'parent_id';
	public $NAME = "баннеры";
	public $NAME2 = "баннер";
	public $MULTI_LANG = 1;//добавляем поле

	function __construct() {
		$this->fld[] = new Field( "title", "Заголовок", 1, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		$this->fld[] = new Field( "active", "Опубликовать", 6, array( 'showInList' => 1, 'editInList' => 1 ) );
		$this->fld[] = new Field( "text", "Текст", 2, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		$this->fld[] = new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 );
		$this->fld[] = new Field( "url", "Адрес для прехода при нажатии на кнопку", 1 );
//		$this->fld[] = new Field( "date", "Дата", 13 );
		$this->fld[] = new Field( "sort", "SORT", 4 );
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title_1'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
		//YandexTranslate( $row, $this->TABLE );
	}
}

class admin_partner extends AdminTable {
	public $TABLE = 'partner';
	public $IMG_SIZE = 480; // макс высота
	public $IMG_VSIZE = 144;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1180;
	public $IMG_BIG_VSIZE = 354;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'title';
	public $SORT = 'sort DESC';
	public $RUBS_NO_UNDER = 1;
//    public $FIELD_UNDER         = 'parent_id';
	public $NAME = "партнеры";
	public $NAME2 = "партнера";
	public $MULTI_LANG = 1;//добавляем поле

	function __construct() {
		$this->fld[] = new Field( "title", "Идентификатор партнера", 1, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		$this->fld[] = new Field( "active", "Опубликовать", 6, array( 'showInList' => 1, 'editInList' => 1 ) );
//		$this->fld[] = new Field( "text", "Текст", 2, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		$this->fld[] = new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 );
//		$this->fld[] = new Field( "date", "Дата", 13 );
		$this->fld[] = new Field( "sort", "SORT", 4 );
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title_1'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
		//YandexTranslate( $row, $this->TABLE );
	}
}

class admin_service_category extends AdminTable {
	public $TABLE = 'service_category';
	public $IMG_SIZE = 480; // макс высота
	public $IMG_VSIZE = 144;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1180;
	public $IMG_BIG_VSIZE = 354;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'title';
	public $SORT = 'sort DESC';
	public $RUBS_NO_UNDER = 1;
//    public $FIELD_UNDER         = 'parent_id';
	public $NAME = "категории услуг";
	public $NAME2 = "категорию услуг";
	public $MULTI_LANG = 1;//добавляем поле

	function __construct() {
		$this->fld[] = new Field( "title", "Название", 1, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		//$this->fld[] = new Field( "active", "Опубликовать", 6, array( 'showInList' => 1, 'editInList' => 1 ) );
		$this->fld[] = new Field( "text", "Текст", 2, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		$this->fld[] = new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 );
//		$this->fld[] = new Field( "date", "Дата", 13 );
		$this->fld[] = new Field( "sort", "SORT", 4 );
		$this->fld[] = new Field( "parent_category_id","Принадлежит категории",9, array(
			'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'service_category', 'valsFromCategory'=>null,
			'valsEchoField'=>'title', 'showInList' => 1));
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title_1'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
		//YandexTranslate( $row, $this->TABLE );
	}
}

class admin_service_item extends AdminTable {
	public $TABLE = 'service_item';
	public $IMG_SIZE = 480; // макс высота
	public $IMG_VSIZE = 144;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1180;
	public $IMG_BIG_VSIZE = 354;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'title';
	public $SORT = 'sort DESC';
	public $RUBS_NO_UNDER = 1;
//    public $FIELD_UNDER         = 'parent_id';
	public $NAME = "услуги";
	public $NAME2 = "услугу";
	public $MULTI_LANG = 1;//добавляем поле

	function __construct() {
		$this->fld[] = new Field( "title", "Заголовок", 1, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		//$this->fld[] = new Field( "active", "Опубликовать", 6, array( 'showInList' => 1, 'editInList' => 1 ) );
		$this->fld[] = new Field( "text", "Текст", 2, array( 'multiLang' => 1 ) );//, array('multiLang'=>1) добавляем в переменной мультиязычная ли она
		$this->fld[] = new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 );
		$this->fld[] = new Field( "date", "Дата", 13 );
		$this->fld[] = new Field( "sort", "SORT", 4 );
		$this->fld[] = new Field( "parent_category_id","Принадлежит категории",9, array(
			'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'service_category', 'valsFromCategory'=>null,
			'valsEchoField'=>'title', 'showInList' => 1));
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title_1'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
		//YandexTranslate( $row, $this->TABLE );
	}
}