<?php
if(!defined('SECURITY')){
	die("Bạn không có quyền truy cập file này");
}
$cat_name = $_GET['cat_name'];
$cat_id = $_GET['cat_id'];

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$rows_per_page = 5;

$per_row = $page*$rows_per_page-$rows_per_page;

$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product WHERE $cat_id=cat_id"));
$total_pages = ceil($total_rows/$rows_per_page);

$list_pages = '';
$page_prev = $page -1;
if($page_prev <= 0){
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_name='.$cat_name.'&cat_id='.$cat_id.'&page='.$page_prev.'">&laquo;</a></li>';
for($i=1; $i<=$total_pages; $i++){
    if($i==$page){
        $active = 'active';
    }else{
        $active = '';
    }
    $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=category&cat_name='.$cat_name.'&cat_id='.$cat_id.'&page='.$i.'">'.$i.'</a></li>';
}
$page_next = $page + 1;
if($page_next > $total_pages){
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_name='.$cat_name.'&cat_id='.$cat_id.'&page='.$page_next.'">&raquo;</a></li>';
//
$sql = "SELECT * FROM product WHERE $cat_id=cat_id ORDER BY prd_id DESC LIMIT $per_row, $rows_per_page";
$query = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($query);
?>

                <div class="products">
                    <h3><?php echo $cat_name; ?> (hiện có <?php echo $num_rows; ?> sản phẩm)</h3>
                    <div class="product-list row">
                        <?php while($row = mysqli_fetch_assoc($query)){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/kho_thuoc/<?php echo $row['prd_image']; ?>"></a>
                                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
                                <p>Giá Bán: <span><?php echo $row['prd_price']; ?>đ</span></p>
                            </div>
                        </div> 
                            <?php } ?>
                    </div>
                </div>
                
                <div id="pagination">
                    <ul class="pagination">
                    <?php echo $list_pages; ?>
                    </ul> 
                </div>