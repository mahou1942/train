{include file="header.tpl"}{*頁面頭*}

<table width="{$width}" border="{$border}">

    <tr>
      <td>{$thd1}</td>
      <td>{$thd2}</td>
      <td>{$thd3}</td>
      <td>{$thd4}</td>
      <td>{$thd5}</td>
      <td>{$thd6}</td>
      <td>{$thd7}</td>
    </tr>


  {foreach $myDatas as $myData}
	<tr>
  {foreach $myData as $key => $value}
    <td>{$value}</td>
  {/foreach}
  </tr>
  {/foreach}


</table>

{include file="foot.tpl"}{*頁面尾*}
