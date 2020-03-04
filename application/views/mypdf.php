<style>
	table,
	th,
	td {
		border: 1px solid black;
		border-collapse: collapse;
		padding: 5px;
	}

</style>
<div id="content">
	<h3 style="font-size: 18px;" align="center">
		แบบสรุปรายงานผลการดำเนินงานบริการโครงการ/กิจกรรมผู้สำเร็จด้านวิทยาศาสตร์และเทคโนโลยี</h3>
	<h4 style="font-size: 16px;" align="center">ครั้งที่1 <input type="radio" id="male" name="gender" value="male"> วันที่
		1 ตุลาคม-31 ธันวาคม 25.. (รายงานภายในวันที่ 16 มกราคม 25...)</h4>
	<h4 style="font-size: 16px;" align="center">ครั้งที่2 <input type="radio" id="male" name="gender" value="male"> วันที่
		1 มกราคม-31 มีนาคม 25.. (รายงานภายในวันที่ 16 เมษายน 25...)</h4>
	<h4 style="font-size: 16px;" align="center">ครั้งที่3 <input type="radio" id="male" name="gender" value="male"> วันที่
		1 เมษายน-30 มิถุนายน 25.. (รายงานภายในวันที่ 16 กรกฎาคม 25...)</h4>
	<h4 style="font-size: 16px;" align="center">ครั้งที่4 <input type="radio" id="male" name="gender" value="male"> วันที่
		1 กรกฎาคม-30 กันยายน 25.. (รายงานภายในวันที่ 16 กรกฎาคม 25...)</h4>
	<table align="center" style="width:76%">
		<tr>
			<th style="font-size: 16px;" rowspan="2">ชื่องาน/โครงการ</th>
			<th rowspan="2">วัตถุประสงค์/เป้าหมาย</th>
			<th colspan="3">งบประมาณที่ได้รับ(บาท)</th>
		</tr>
		<tr>
			<th>รายได้</th>
			<th>ผลประโยชน์</th>
			<th>อื่นๆ</th>
		</tr>
		<tr>
			<td rowspan="3">งานโครงการ<br>
			</td>
			<td rowspan="3">วัตถุประสงค์<br>
				1.2.</td>
			<td>19,000</td>
			<td align="center">-</td>
			<td align="center">-</td>
		</tr>
		<tr>
			<td colspan="3" align="center">จำนวนเงินจ่ายจริง (บาท) </td>
		</tr>
		<tr>
			<td align="center">แผ่นดิน</td>
			<td align="center">ผลประโยชน์</td>
			<td align="center">อื่นๆ</td>
		</tr>
		<tr>
			<td rowspan="3">ระยะเวลา <br>
				ดำเนินการระหว่างวันที่</td>
			<td rowspan="3">เป้าหมาย จำนวน คน</td>
			<td colspan="3" align="center">ไตรมาสที่</td>
		</tr>
		<tr>
			<td align="center">แผน(หน่วยนับ)</td>
			<td align="center">ผล(หน่วยนับ)</td>
			<td align="center">ร้อยละ</td>
		</tr>
		<tr>
			<td align="center" colspan="3" style="width: 141px; height: 20px;"></td>
		</tr>
		<tr>
			<td rowspan="3" style="width: 141px; height: 20px;">สถานที่ดำเนินการ<br>
			</td>
			<td rowspan="3"  align="center" style="width: 141px; height: 20px;">แผนการปฎิบัติงาน(ตัวชี้วัด)เชิงปริมาณ</td>
			<td colspan="3"  align="center"  style="width: 141px; height: 30px;"></td>
		</tr>
    <tr>
			<td align="center">แผน(หน่วยนับ)</td>
			<td align="center">ผล(หน่วยนับ)</td>
			<td align="center">ร้อยละ</td>
		</tr>
    <tr>
			<td align="center">แผน(หน่วยนับ)</td>
			<td align="center">ผล(หน่วยนับ)</td>
			<td align="center">ร้อยละ</td>
		</tr>
	</table>
</div>
<div id="editor"></div>
<button id="aaaa">generate PDF</button>
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
	integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script>
	var doc = new jsPDF()
	doc.fromHTML($('#content').html());
	doc.save('a4.pdf')

</script>
