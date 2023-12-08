<?php include('includes/header.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php
    // var_dump($_GET['edit']);
    $query = mysqli_query($conn, "select * from tblonlinhas");
    while ($row = mysqli_fetch_array($query)) {
        if($row['cod_onlinha']==$_GET['edit']) {
            $pro_name=$row['referencia'];
            $unidade=$row['unidade'];
            $quantidade=$row['quantidade'];
            $price=$row['precounitario'];
            $descontol=$row['descontol'];
            $iva=$row['iva'];            
            break;
        }
    }


?>

<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form action="updateData.php" method="post">
            <div class="modal-body">
                <h4 class="text-blue h4 mb-10">Identificação Artigo/Linha</h4>
                <input type="hidden" name="cod_onlinha" value="<?php echo $_GET['edit']; ?>" />
                
                <div class="form-group">
                    <label>Nome:</label>
                    <select class="custom-select2 form-control"  id="codartigo" style="width: 100%; height: 38px" disabled >
                        <?php
                        $query = mysqli_query($conn, "select * from tblartigos");
                        while ($row = mysqli_fetch_array($query)) {
                            // if($row['artigo']==$_GET['edit']) 

                        ?>
                            <option value="<?php echo $row['artigo']; ?>" 
                                <?php if($row['artigo']==$pro_name)  {                                    
                                    echo "selected";
                                }
                                    else echo "";
                                ?> >
                                <?php echo $nartigo = utf8_encode($row['descricao']);  ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="codartigo"  value="<?php echo $pro_name ?>">
                    
                </div>
                <div class="form-group">
                    <label>Unidade</label>
                    <input class="form-control" name="Unidade" id="Unidade" value=<?php echo $unidade; ?> type="text" readonly/>
                </div>
                <div class="form-group">
                    <label>Quantidade</label>
                    <input class="form-control" name="quantidadelinha" id="quantidadelinha" value=<?php echo $quantidade;?> type="number" min="1"  required/>
                </div>
                <div class="form-group">
                    <label>Desconto (%)</label>
                    <input class="form-control" name="desconto" id="desconto" value=<?php echo $descontol;?> type="number" min="0" max="25" required/>
                </div>
                <div class="form-group">
                    <label>IVA</label>
                    <input class="form-control" name="iva" id="iva" value=<?php echo $iva; ?> type="number" readonly/>
                </div>
                <div class="form-group">
                    <label>PVP</label>
                    <input class="form-control" name="product_price" id="product_price" value=<?php echo $price; ?> ; type="text" readonly/>
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input class="form-control" name="stock" id="stock" value="<?php 
                        $query = mysqli_query($conn, "select * from tblartigos");
                            while ($row = mysqli_fetch_array($query)) {
                                if($row['artigo']==$pro_name){
                                    echo $row['stock'];
                                    break;
                                }
                                
                            }
                    ?>" type="text" readonly/>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Confirmar
                    </button>
                    <button type="button" class="btn btn-primary"  onclick="handlecancel()">
                        Fechar
                    </button>
                </div>
        </form>
    </div>
</div>
<script>
    // function handlesubmit() {

    //     var codartigo = document.getElementById("codartigo").value;
    //     var Unidade = document.getElementById("Unidade").value;
    //     var quantidadelinha = document.getElementById("quantidadelinha").value;
    //     var desconto = document.getElementById("desconto").value;
    //     var iva = document.getElementById("iva").value;
    //     var product_price = document.getElementById("product_price").value;

    //     if(quantidadelinha>0&&desconto>=0&&desconto<=25){
    //         $.post("updateData.php", {
                
    //             cod_onlinha:$_GET['edit'],
    //             codartigo: codartigo,                
    //             Unidade: Unidade,
    //             quantidadelinha: quantidadelinha,
    //             desconto: desconto,
    //             iva: iva,
    //             product_price: product_price
    //         },
    //         function(data, status) {

    //         });
    //     }
       
    // }
    function handlecancel(){
        window.location.href="criaron2.php";
    }
</script>