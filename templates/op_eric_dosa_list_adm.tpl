<div class="container-fluid">
  <div class="row">
    <div class="col col-md-8 text-center">
      <h4>學務處相關登記細項列表</h4>
    </div>

    <div class="col col-md-2">
      <a class="btn btn-primary" href="../admin/main.php?op=cate_counts " role="button">回查詢頁</a>
    </div>
  </div>
  <table class="table table-responsive table-hover caption-top">
    <thead class="thead-primary">
      <tr>
        <div class="row">
          <th scope="col" class="table-secondary">
            <h5>序號</h5>
          </th>
          <th scope="col" class="table-secondary">
            <h5>登記人員</h5>
          </th>
          <th scope="col" class="table-secondary">
            <h5>班級</h5>
          </th>

          <th scope="col" class="table-secondary">
            <h5>日期</h5>
          </th>
          <!-- <th scope="col">
            <h5>節次</h5>
          </th> -->
          <th scope="col" class="table-secondary">
            <h5>姓名</h5>
          </th>
          <th scope="col" class="table-secondary">
            <h5>登載項目</h5>
          </th>
          <th scope="col" class="table-secondary">
            <h5>次數/分數</h5>
          </th>
        </div>
      </tr>
    </thead>
    <tbody>
      <{foreach from=$all key=i item=eric_dosa_content}>
      <tr>
        <td class="text-right"><{$eric_dosa_content.sn}></td>
        <td><{$eric_dosa_content.staff_name}></td>

        <td><{$eric_dosa_content.c_class}></td>

        <td><{$eric_dosa_content.item_date}></td>
        <!-- <td><{$eric_dosa_content.period}></td> -->
        <td><{$eric_dosa_content.std_name}></td>
        <td><{$eric_dosa_content.item_txt}></td>
        <td class="text-center"><{$eric_dosa_content.item_freq}>(<{$eric_dosa_content.score_s}>)</td>
      </tr>
      <{/foreach}>
    </tbody>
  </table>

  <{$bar}>
</div>
