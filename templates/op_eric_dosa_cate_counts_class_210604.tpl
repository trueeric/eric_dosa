<div class="container-fluid">
  <div class="row">
    <div class="col col-md-8 text-center">
      <h4>各班相關登記次數學期統計</h4>
    </div>
    <div class="col col-md-2">單位:次</div>
    <div class="col col-md-2">
      <a class="btn btn-primary" href="index.php?op=cate_counts " role="button">下一頁</a>
    </div>
  </div>
  <div class="container py-2">
    <table class="fixed_header table table-borderd table-striped mb-0">
      <thead>
        <tr>
          <th scope="col">
            <h5>班級</h5>
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
        </tr>
      </thead>
      <tbody>
        <{foreach from=$all key=i item=eric_dosa_cate_counts}>
        <tr>
          <th scope="row"><{$eric_dosa_cate_counts.eclass}></th>

          <td class="text-info text-right"><{$eric_dosa_cate_counts.1}></td>
          <td class="text-info text-right"><{$eric_dosa_cate_counts.2}></td>
          <td class="text-info text-right"><{$eric_dosa_cate_counts.3}></td>
          <td class="text-info text-right"><{$eric_dosa_cate_counts.4}></td>
          <td class="text-info text-right"><{$eric_dosa_cate_counts.5}></td>
          <td class="text-success text-right"><{$eric_dosa_cate_counts.21}></td>
          <td class="text-success text-right"><{$eric_dosa_cate_counts.22}></td>
        </tr>
        <{/foreach}>
      </tbody>
    </table>
  </div>
</div>
