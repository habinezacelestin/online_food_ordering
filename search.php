<?php
include('connection/connect.php');
if(isset($_POST['input'])){
 $input=$_POST['input'];

    $qry="SELECT * FROM products where pro_name LIKE '{$input}%' OR pro_price LIKE '{$input}%' OR pro_type LIKE '{$input}%'";
    $qwery=mysqli_query($db,$qry);
    if(!$qwery || mysqli_num_rows($qwery) == 0){
        
        echo "<script type='text/javascript'>alert('no such name found')</script>";
    }else{
        ?>
       
        <div class="row">
            <?php
       while($row=mysqli_fetch_assoc($qwery)){
        ?>
        <div class="col-md-3 py-3">
        <div class="card shadow h-100 w-100">
        <form method='post' action="cart.php?action=add&pro_id=<?= $row['pro_id'] ?>">
     <img src="images/img/<?= $row['pro_image'] ?>" alt="" class="img-thumbnail img-fluid"
      style="width:100% ; height:250px; cover:fit; justify-content: center;justify-items: center;">
     
      <div class="card-body">
             <p><b>Food name:<?= $row['pro_name'] ?></b> </p>
          <span><b>Price:<?=number_format($row['pro_price'],2) ?></b></span><span>Rwf</span>
          <input type="hidden" name="pro_name" value="<?= $row['pro_name'] ?>"/>
          <input type="hidden" name="pro_price" value="<?= $row['pro_price'] ?>"/>
          <input type="number" name="quantity" value="1" class="form-control"/>
         <div><input type="submit" name="add_to_cart" value="Add to Cart" class="btn bg-warning float-end btn-block my-3"></div>
          
      </div>
      </form>
      </div>
       </div> 
      <?php
         }
       
         ?>   
     </div>    
      
    

<?php

}
}
?>