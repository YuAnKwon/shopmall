<? //메모패스워드
echo ("
   <form method=post   action=cpass2.php?board=$board&id=$id&mode=$mode&wdate=$wdate&wname=$wname&wmemo=$wmemo>
   <table border=0 width=400 align=center>
   <tr><td align=center>암호를 입력하세요</td></tr>
   <tr><td align=center>암호: <input type=password size=15 name='pass'>
   <input type=submit value=입력></td></tr>
   </form>
   </table>
");
?>