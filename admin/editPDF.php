<?php include('includes/header.php')?>
<?php include('../includes/session.php') ?>

<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Create a new Dompdf instance

$cod_on=$_SESSION['codon'];
$sql = "SELECT totalmerc, totaldescontos, valoriva, totallinha FROM tblonlinhas where cod_on='$cod_on'";
$query = $dbh->prepare($sql);
// $query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$Mercadoria=0;
$Descontos=0;
$DescontosF=0;
$IVA=0;
$AKZ=0;
if ($query->rowCount() > 0) {
  foreach ($results as $result) {
    $Mercadoria+=$result->totalmerc;
    $Descontos+=$result->totaldescontos;
    $IVA+=$result->valoriva;
    $AKZ+=$result->totallinha;
  }
  $MercadoriaF= number_format( $Mercadoria, 2, ',', '.' );
  $Descontos= number_format( $Descontos, 2, ',', '.' );
  $IVAF= number_format( $IVA, 2, ',', '.' );
  $AKZF= number_format( $AKZ, 2, ',', '.' );
}
											
// HTML content to be converted to PDF
$dompdf = new Dompdf();						
$options = $dompdf->getOptions(); 
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
// $row['referencia']  $row['nomeartigo'] $row['unidade'] $row['quantidade'] $row['precounitario'] $row['iva'] $row['descontol'] $row['precol']

$codon = $_SESSION['codon'];
// Load HTML content into Dompdf
$html='<html>
<style>
.page {
  width: 100%;
  height: 100vh;
  
  box-sizing: border-box;
}

.left-section {
  width: 45%;    
  float: left;
}

.right-section {
  width: 50%;    
  float: left;
}
.right-section .half-section {
  width: 25%;
  float: left;
}
@media print {
  .page {
    height: auto;
  }
}
table,th,td,thead{
  border: 0px solid black;
  border-collapse: separate;
  font-family: Arial, sans-serif;
  font-size: 10px;
  border-spacing: 20px;
  page-break-inside: avoid;
}
th {
font-weight: bold;
}
.grid-container {
display: flex;
align-items: flex-start;
}

.textocabecalho {
      font-family: Verdana, Times, serif;
      font-style: normal;
      font-weight: normal;
      src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format("truetype");
     font-size: 10px;
}
.textofim {
     font-family: Verdana, Times, serif;
     font-size: 10px;
}
table {
width: 100%;
border: 0px solid;

}
.right{
text-align: right !important;
}
.left{
text-align: left !important;
}
.bottom_border{
border-bottom: 1px solid black;
}
</style>
  <body>
    <div style="float: left;">
        <img src="https://testes.labsoft.pt/uploads/QMLogo.png" alt="Logotipo QM" width="120" height="137">
        <p class="textocabecalho">QUIMICOIL, LDA</p>
        <p class="textocabecalho">Contribuente N.º 5419018250</p>
        <p class="textocabecalho">Estrada de Catete Km 19</p>
        <p class="textocabecalho">Viana - Luanda</p>
        <p class="textocabecalho">Capital Social 100 000 000,00</p>
        <p class="textocabecalho">Matricula N.º 1715-17</p>
        <p class="textocabecalho">www.quimicoil.com</p>
    </div>
    <div style="float: right; padding-right: 10px; padding-top: 15px;">';

    $sql2 = "SELECT * from tblon JOIN tblutilizadores ON tblutilizadores.cod_utilizador = tblon.cod_utilizador JOIN tblclientes ON tblclientes.cod_cliente = tblon.cod_cliente AND cod_on= '$codon'";
$query2 = mysqli_query($conn, $sql2) or die(mysqli_error());
while ($row2 = mysqli_fetch_array($query2)) {                         
    $html.='<p class="textocabecalho"><strong>Oportunidade de Negócio N.º '.$row2['cod_on'].'</strong></p>
            <p class="textocabecalho">Data Emissão:'.$row2['dataemissao']. '</p>
            <p class="textocabecalho">Emitida por: '.$row2['FirstName'].' '.$row2['LastName'].'</p><br>';   

    $html.='
        <p class="textocabecalho">Exmo.(s) Sr.(s)</p>
        <p class="textocabecalho">'.$row2['nomecliente'].'</p> 
        <p class="textocabecalho">'.$row2['nif'].'</p>
        <p class="textocabecalho">'.$row2['contacto'].'</p> 
        <p class="textocabecalho">'.$row2['email'].'</p>'; 
        }
    $html.='</div>
    <div style="padding-top: 300px;">
    <p><strong><center>
      ESTE DOCUMENTO NÃO SERVE DE FATURA</center></strong></p>
    </div>
    <table class="table">
        <thead style="border-bottom: 1px solid blue;">
            <tr >
                <th class="textocabecalho left">Artigo</th>
                <th class="textocabecalho left">Descrição</th>
                <th class="textocabecalho right">Qtd.</th>
                <th class="textocabecalho right">Un.</th>
                <th class="textocabecalho right">Pr. Unitário</th>
                <th class="textocabecalho right">Dec</th>
                <th class="textocabecalho right">IVA</th>
                <th class="textocabecalho right">Valor</th>
            </tr>
        </thead>
      <tbody>';            
                    
$sql = "SELECT * from tblonlinhas WHERE cod_on= '$codon'";
$query = mysqli_query($conn, $sql) or die(mysqli_error());
while ($row = mysqli_fetch_array($query)) {   
    $ValorLinha= number_format( $row['totallinha'], 2, ',', '.' );
                                          
    $html.='<tr ><td class="left bottom_border" ">'.$row['referencia'].'</td>
                <td class="left bottom_border" ">'.$row['nomeartigo'].'</td>
                <td class="right bottom_border" ">'.$row['quantidade'].'</td>
                <td class="right bottom_border" ">'.$row['unidade'].'</td>
                <td class="right bottom_border" ">'.$row['precounitario'].'</td>
                <td class="right bottom_border" ">'.$row['descontol'].'</td>
                <td class="right bottom_border" ">'.$row['iva'].'</td>             
                <td class="right bottom_border" ">'.$ValorLinha.'</td>                
            </tr>';    
}   
// <td>'.$row['precol'].'</td>
$html.='</tbody>
  <thead style="border-bottom: 1px solid blue;">
  </table>
  <br><hr/>
    
  <div class="page" style="page-break-inside: avoid;">

      <div class="left-section" style="font-size: 12px;">
          
        <p style = "font-size:11px">Quadro Resumo de Impostos</p>
        <hr style = "margin-bottom:4px">
        <div style="margin: 0; padding: 0;">
          <p style="display: inline-block; margin: 0;">Taxa/Valor</p>
          <p style="display: inline-block; padding-left: 60px; margin: 0;">Incid./Qtd.</p>
          <p style="display: inline-block; padding-left: 30px; margin: 0;">Total</p>
          <p style="display: inline-block; padding-left: 50px; margin: 0;">Motivo Isenção</p>
        </div>
        <hr style="margin: 0; padding: 0;">
        <div style = "margin-bottom: 0; padding-top: 0; margin-top: 0;">
          <p style = "display:inline-block">IVA</p>
          <p style = "display:inline-block; padding-left:90px">'. $Mercadoria .'</p>
          <p style = "display:inline-block; padding-left:20px">'.$IVA.'</p>
        </div>
      
        <br>
        <div style="width:50%; float:left;">
          Carga
          <hr/>
          <p>N/ Morada - 2023-10-25 / 08:08</p>
          <p>Estrada de Catete Km 19</p>
          <p>Viana - Luanda</p>
          <p>0000 Luanda</p>
          <p>Angola</p>
        </div>
        <div style="width:50%; float:right;">
          Descarga
          <hr/>
          <p>V/ Morada</p>
          <p>VIANA</p>
          <p>Luanda</p>
          <p>0000 Luanda</p>
          <p>Angola</p>
        </div>

      </div>
      <div class="right-section" style="font-size: 10px;">       
        <div class="half-section">
          <p class="bottom_border">*Mercadoria: </p>
          <p class="bottom_border">*Descontos: </p>
          <p class="bottom_border">*IVA: </p>
          <p class="bottom_border">*AKZ: </p>
        </div>
        <div class="half-section" style="margin-left:80px;">
          <p class="bottom_border right">'. $MercadoriaF .'</p>
          <p class="bottom_border right">'. $DescontosF .'</p>
          <p class="bottom_border right">'. $IVAF .'</p>
          <p class="bottom_border right">'. $AKZF .'</p>
        </div>       
      </div>    
  </div>
    <br><br>
    <div style="clear: both;"></div>
  <div class="page">
    <div class="left-section">
      <p  class="textofim"><strong>Banco Millenium Atlantico</strong> | Nº 118869737 10 002 | IBAN: AO06.0055.0000.1886.9737.1028.8</p>
      <p  class="textofim"><strong>Banco BIC</strong> | Nº 141268088 15 1 | IBAN: AO06.0051.0000.4126.8088.1517.8</p>
      <p  class="textofim"><strong>Banco Caixa Angola</strong> | Nº 7934965/10/001 | IBAN: AO06.0004.0000.0793.4965.1016.4</p>
      <p  class="textofim"><strong>Banco Sol</strong> | Nº 103745187 10 001 | IBAN: AO06.0044.0000.0374.5187.1018.5</p>
      <p  class="textofim"><strong>Banco Finibanco</strong> | Nº 47161241/10/001 | IBAN: AO06.0058.0000.0471.6124.1019.8</p>
    </div>
    <div class="right-section">
      <p  class="textofim">* Reservamos o direito de debitar juros de mora conforme a lei, contados a partir da data de vencimento da factura. (Lei 13/03 de 14 de Fevereiro);</p>
      <p  class="textofim">* A Quimicoil, reserva o direito de propriedade do que consta na presente factura até a integral e boa cobrança da mesma ao abrigo do disposto no artigo nº 409 do nº1 do Código Civil;</p>
      <p  class="textofim">* Não se aceitam devoluções de mercadorias a não ser por defeito de fabrico;</p>
      <p  class="textofim">* Não extornamos Transfêrencias. Em caso de desistência terá de  trocar por outra mercadoria;</p>
      <p  class="textofim">* Este documento tem validade máxima de 72 horas.</p>
    </div>
  </div> 

</body>
</html>';
$dompdf->loadHtml($html);

// Set additional options (optional)
$dompdf->setPaper('A4', 'portrait');

// Render the PDF
$dompdf->render();


$currentDateTime = new DateTime(); // Current date and time
$currentDateTimeAsString = $currentDateTime->format('Y-m-d_H-i-s');
$user=$_SESSION['codon'];
$pdf_name=$currentDateTimeAsString.'_'.$user;
// Save the PDF to a file on the server
$output = $dompdf->output();
$success= file_put_contents('../comercial/uploads/ON/'.$pdf_name.'.pdf', $output);
$urla = '/comercial/uploads/ON/'.$pdf_name.'.pdf';
if($success=true){
    // var_dump("successfully made");
    
    $sql = "UPDATE tblon  SET estado = '1', valoriva = '$IVA', valormercadoria='$Mercadoria', valordesconto='$Descontos', valortotal='$AKZ', urla='$urla', dataemissao='$currentDateTimeAsString' WHERE cod_on= '$codon'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error());
    header("Location: on.php");
    var_dump("successfully made");
}
else{
  header("Location: criaron.php");
}
