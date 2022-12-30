<?php
function getthemonth($date){
    $firstday = date('Y-m-01', strtotime($date));//取得該日期月份的第一天
    $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));//取得該日期月份的最後一天
    return array($firstday,$lastday);
}
$YM = (isset($_GET['date'])?$_GET['date']:date("Y-m"));
$day=getthemonth($YM);
echo '<b>'.$YM.'</b>';
echo '<br/>';
echo '這個月有幾 '.$dayCount = date("t",strtotime($day[0])).' 天';
echo '<br/>';
echo '這個月的第一天是禮拜 '.$weekday = date('w', strtotime($day[0]));
echo '<br/>';
echo '這個月的最後一天是禮拜 '.date('w', strtotime($day[1]));
echo '<br/>';
echo $d_first=date("j",strtotime($day[0])).' - '.$d_last=date("j",strtotime($day[1]));
$d_last=$dayCount+$weekday-1;//若第一天不是禮拜日
echo '<br/>';
echo 'last:'.$d_last;
?>
<div style="width:1024;background-color:#333;">
<?php
$i=1;
for($x=0;$x<=41;$x++){//顯示42格
    echo '<div style="background-color:'.($x+1>$weekday && $x<=$d_last?'#f0f0f0':'#ffffff')//
.';width:140px;height:140px;float:left; border:#ffffff 1px solid;">'
.($x+1>$weekday && $x<=$d_last ?'['.$i.']':'')."</div>";
$i=($x+1>$weekday?$i+1:1);
}
?>
</div>
<div style="clear:both;width:1024;">
<a href="?date=<?php echo date("Y-m",strtotime('-1 month',strtotime($YM)));?>" style="float:left;">上個月</a>
<a href="?date=<?php echo date("Y-m",strtotime('+1 month',strtotime($YM)));?>" style="float:right;">下個月</a>
</div>