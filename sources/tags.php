<?php if (!defined('_source')) die("Error");

@$id =  addslashes($_GET['id']);

$per_page = 12; // Set how many records do you want to display per page.
$startpoint = ($page * $per_page) - $per_page;
$limit = ' limit ' . $startpoint . ',' . $per_page;

if ($id) {

    $d->reset();
    $d->query("select * from #_tags where hienthi=1 and type='tags' and id='" . $id . "'");
    $row_detail = $d->fetch_array();

    $title_other = _sanphamkhac;

    $title_detail = $row_detail['ten_'.$lang];
    if ($row_detail['title'] != '') {
        $title_bar = $row_detail['title'];
    } else {
        $title_bar = $row_detail['ten_' . $lang];
    }
    $keywords_bar = $row_detail['keywords'];
    $description_bar = $row_detail['description'];

    $d->reset();

    $where = " #_product where type='" . $type_bar . "' and FIND_IN_SET($id, tags) and hienthi=1 ";

    $sql = " select id,ten_$lang,giaban,giacu,tenkhongdau,photo, thumb from ";

    $startpoint = ($page * $per_page) - $per_page;
    $limit = ' limit ' . $startpoint . ',' . $per_page;
    $sql .= $where . " order by stt,ngaytao desc $limit";

    $d->query($sql);
    $product = $d->result_array();

    $url = getCurrentPageURL();
    $paging = pagination($where, $per_page, $page, $url);
}
