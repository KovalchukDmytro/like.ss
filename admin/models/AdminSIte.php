<?php

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