<div class="container-fluid">
  <div class="row">
    <div class="col col-md-8 text-center">
      <h4>學務處相關登記統計</h4>
    </div>
    <div class="col col-md-2">單位:次</div>
    <div class="col col-md-2">
      <a class="btn btn-primary" href="index.php?op=cate_counts_class " role="button">下一頁</a>
    </div>
  </div>

  <table class="table table-responsive table-hover caption-top">
    <!-- <a href="index.php?op=dosa_count"></a> -->
    <thead class="thead-primary">
      <tr>
        <div class="row">
          <th scope="col">
            <h5>年級</h5>
          </th>

          <th scope="col" class="table-info">
            <h5>上學遲到</h5>
          </th>
          <th scope="col" class="table-info">
            <h5>升旗</h5>
          </th>
          <th scope="col" class="table-info">
            <h5>午休</h5>
          </th>
          <th scope="col" class="table-info">
            <h5>上課常規</h5>
          </th>
          <th scope="col" class="table-info">
            <h5>生活常規</h5>
          </th>
          <th scope="col" class="table-success">
            <h5>室內衛生</h5>
          </th>
          <th scope="col" class="table-success">
            <h5>室外衛生</h5>
          </th>
        </div>
      </tr>
    </thead>
    <tbody>
      <{foreach from=$all key=i item=eric_dosa_cate_counts_grade}>
      <tr>
        <td><{$eric_dosa_cate_counts_grade.grade}></td>

        <td class="text-info text-right"><{$eric_dosa_cate_counts_grade.1}></td>
        <td class="text-info text-right"><{$eric_dosa_cate_counts_grade.2}></td>
        <td class="text-info text-right"><{$eric_dosa_cate_counts_grade.3}></td>
        <td class="text-info text-right"><{$eric_dosa_cate_counts_grade.4}></td>
        <td class="text-info text-right"><{$eric_dosa_cate_counts_grade.5}></td>
        <td class="text-success text-right"><{$eric_dosa_cate_counts_grade.21}></td>
        <td class="text-success text-right"><{$eric_dosa_cate_counts_grade.22}></td>
      </tr>
      <{/foreach}>
    </tbody>
  </table>
</div>
