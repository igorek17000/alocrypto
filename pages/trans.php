<br>


<div class="m-4">
    <ul class="nav nav-pills">
        <li class="nav-item" id="fdeopsit">
            <a href="#"  class="nav-link ">Deposit</a>
        </li>
        <li class="nav-item" id="fwithdraw">
            <a href="#" class="nav-link">withdraw</a>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">Messages</a>
        </li> -->
    </ul>
</div>
<script>
    $(document).ready(function () {
        $("#fdeopsit").click(function (e) { 
            // e.preventDefault();
            $.ajax({
                type: "GET",
                url: "handler",
                data: {
                    isHistory:true,
                    history:"deposit"
                },
                dataType: "text",
                success: function (response) {
                    window.location.reload()  
                }
            });
            // $_SESSION['history']="deposit"
             
        });
        $("#fwithdraw").click(function (e) { 
            $.ajax({
                type: "GET",
                url: "handler",
                data: {
                    isHistory:true,
                    history:"withdraw"
                },
                dataType: "text",
                success: function (response) {
                    window.location.reload()  
                }
            });  
        });
    });
</script>
<div class="container" style="

margin:4px, 4px;
                padding:4px;
                background-color: wheat;

                height: 70%;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;

">
<?php 
 if(empty($_SESSION['history'])){

 
?>
<h3>Deposit</h3>
    <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                   <th>Id</th>
                <th>Addres</th>
                <th>Amount(BTC)</th>
                <th>Trasaction code</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>

<?php
$con = Database::getConn();
// echo $id;
$stm = $con->prepare("SELECT * FROM `payments_trasact` WHERE `uid`=:id");
$stm->bindParam(":id", $id);
$stm->execute();
// echo $stm->rowCount();
if ($stm->rowCount() > 0) {
    for ($i = 0; $i < $stm->rowCount(); $i++) {
        $row = $stm->fetch();
        //    echo $i;
        ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->addr; ?></td>
                  <td><?php echo  $row->value; ?></td>
                  <td><?php echo $row->txid; ?></td>
                  <?php

        if ($row->status == -1) {
            echo "<td>Unpaid</td>";
        }
        if ($row->status == 2) {
            echo "<td>Comfirmed</td>";
        }
        if ($row->status == 0) {
            echo "<td>UnConfirmed</td>";
        }
        if ($row->status == 1) {
            echo "<td>Partially Confirmed,</td>";
        }
        ;
        ?>


                </tr>


                <?php

    }
}
?>
            </tbody>
        </table>
<?php
}else if($_SESSION['history']=="deposit"){

?>
<h3>Deposit</h3>
    <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                   <th>Id</th>
                <th>Addres</th>
                <th>Amount(BTC)</th>
                <th>Trasaction code</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>

<?php
$con = Database::getConn();
$stm = $con->prepare("SELECT * FROM `payments_trasact` WHERE `uid`=:id");
$stm->bindParam(":id", $id);
$stm->execute();
// echo $stm->rowCount();
if ($stm->rowCount() > 0) {
    for ($i = 0; $i < $stm->rowCount(); $i++) {
        $row = $stm->fetch();
        //    echo $i;
        ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->addr; ?></td>
                  <td><?php echo  $row->value; ?></td>
                  <td><?php echo $row->txid; ?></td>
                  <?php

        if ($row->status == -1) {
            echo "<td>Unpaid</td>";
        }
        if ($row->status == 2) {
            echo "<td>Comfirmed</td>";
        }
        if ($row->status == 0) {
            echo "<td>UnConfirmed</td>";
        }
        if ($row->status == 1) {
            echo "<td>Partially Confirmed,</td>";
        }
        ;
        ?>


                </tr>


                <?php

    }
}
?>
            </tbody>
        </table>

<?php
}else if($_SESSION['history']=="withdraw"){

    ?>
    <h3>withdraw</h3>
        <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                       <th>Id</th>
                       <th>Method</th>
                    <th>Addres</th>
                    <th>Amount(BTC)</th>
                    <th>Date</th>
                    <!-- <th>Status</th> -->
                    </tr>
                </thead>
                <tbody>
    
    <?php
    $con = Database::getConn();
    $stm = $con->prepare("SELECT * FROM `withdraw` WHERE `uid`=:id");
    $stm->bindParam(":id", $id);
    $stm->execute();
    // echo $stm->rowCount();
    if ($stm->rowCount() > 0) {
        for ($i = 0; $i < $stm->rowCount(); $i++) {
            $row = $stm->fetch();
            //    echo $i;
            ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row->method; ?></td>
                      <td><?php echo  $row->address; ?></td>
                      <td><?php echo $row->amt; ?></td>
                    
                      <td><?php echo $row->date; ?></td>
    
    
                    </tr>
    
    
                    <?php
    
        }
    }
    ?>
                </tbody>
            </table>
    
    <?php
    }
?>
</div>