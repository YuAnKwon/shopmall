<style>
  table {
    border-top: 1px solid #444444;
    border-collapse: collapse;
  }
  th, td {
    border-bottom: 1px solid #444444;
    padding: 10px;
  }
</style>

<?

if (!$key) {
	echo("<script>
		window.alert('�˻�� �Է��ϼ���');
		history.go(-1);
		</script>");
	exit;
}

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result=mysql_query("select * from $board where $field like '%$key%' order by id desc",$con);
$total = mysql_num_rows($result);

echo("
   <table border=0 width=700 align=center>
   <tr><td align=center colspan=2><h1>�Խ���</h1></td><tr>
   <tr><td>�˻���:$key, ã�� ���� : $total ��</td>
   <td align=right><a href=show.php?board=$board><img src=list.png width=30 height=30></a></td></tr>
   </table>
");

echo("
   <table width=700 align=center>
   <tr><td align=center   width=50><b>��ȣ</b></td>
   <td align=center width=100><b>�۾���</b></td>
   <td align=center width=400><b>����</b></td>
   <td align=center width=150><b>��¥</b></td>
   <td align=center width=50><b>��ȸ</b></td>
   </tr>
");

if (!$total){
	echo("<tr><td colspan=5 align=center>�˻��� ���� �����ϴ�.</td></tr>");
} else {

	$counter=0;

	while($counter<$total):

		$id=mysql_result($result,$counter,"id");
		$writer=mysql_result($result,$counter,"writer");
		$topic=mysql_result($result,$counter,"topic");
		$hit=mysql_result($result,$counter,"hit");
		$wdate=mysql_result($result,$counter,"wdate");
		$space=mysql_result($result,$counter,"space");

		$t="";

		if   ($space>0) {
			for ($i=0 ;   $i<=$space ; $i++)
			$t=$t .  "&nbsp;";	// $space > 0 �� ��� ���� �տ� ���� �߰�
		}

		echo("
			<tr><td align=center>$id</td>
			<td align=center>$writer</td>
			<td align=left>$t<a href=content.php?board=$board&id=$id>$topic</a></td>
			<td align=center>$wdate</td><td align=center>$hit</td>
			</tr>
		");

		$counter = $counter + 1;

	endwhile;

	echo("</table>");
}

mysql_close($con);

?>