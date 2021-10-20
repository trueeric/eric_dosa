<div class="container-fluid">
  <!-- <form action="../index.php" method="get"> -->
  <form>
    <!-- <select class="form-select" name="wkchk" id="weeklist" aria-label="weeks_select"> -->
    <select
      class="form-control"
      name="week"
      id="weeklist"
      aria-label="weeks_select"
      onchange="location.href='index.php?op=cate_counts&weeks=' + this.value"
    >
      <option selected="selected">請選擇周別</option>

      <{foreach from=$all_wks key=i item=act_weeks}>

      <!-- <option value='{$act_weeks.weeks}'
        {if $act_weeks.weeks==$act_weeks.weeks}selected{/if}>第<{$act_weeks.weeks}>周 -->
      <!-- </option> -->
      <option name="weeks" value="<{$act_weeks.weeks}>">第<{$act_weeks.weeks}>周</option>

      <{/foreach}>
    </select>
    <!-- <input type="submit" value="Submit" /> -->
    <!-- 儲存　input:submit -->
    <!-- <input type="submit" value="確定" 　name="send" class="btn btn-primary" />
    <input type="hidden" name="wkchk" value="this.value" /> -->
  </form>

  <!-- <script>
    function getSelectValue() {
      var selectedValue = document.getElementById('weeklist').value
      console.log(selectedValue)
    }
  </script> -->

  <!-- <table class="table table-responsive table-hover caption-top"> -->
  <table class="table table-responsive caption-top">
    <thead class="thead-primary">
      <tr>
        <div class="row">
          <th scope="col">
            <h5>周別</h5>
          </th>
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
        </div>
      </tr>
    </thead>
    <tbody class="table-hover">
      <{foreach from=$all key=i item=eric_dosa_cate_counts}>
      <tr>
        <td>
          <a
            class="btn btn-link"
            href="index.php?op=eric_dosa_list&weeks=<{$eric_dosa_cate_counts.weeks}>&eclass=<{$eric_dosa_cate_counts.eclass}>"
            ><{$eric_dosa_cate_counts.weeks}></a
          >
        </td>

        <td class="text-left"><{$eric_dosa_cate_counts.eclass}></td>

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

  <{$bar}>
</div>
