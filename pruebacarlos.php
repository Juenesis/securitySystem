<div>
	<table id="tableId" border=1>
		<tbody>
			<tr>
				<td>Item one</td>
				<td>Iten one-two</td>
				<td>Iten one-tRES</td>
			</tr>
			<tr><td>Item two</td></tr>
			<tr><td>Item three</td></tr>
		</tbody>
	</table>
</div>
<div>
	<input type="text" id="in-put">
	<input type="text" id="in-put2">
	<input type="text" id="in-put3">
</div>
<script>
	function addRowHandlers() {
		var table = document.getElementById("tableId");
		var rows = table.getElementsByTagName("tr");
		for (i = 0; i < rows.length; i++) {
			var currentRow = table.rows[i];
			var createClickHandler = 
			function(row) 
			{
				return function() { 
					var cell = row.getElementsByTagName("td")[0];
					var cell2 = row.getElementsByTagName("td")[0];
					var cell3 = row.getElementsByTagName("td")[0];
					var id = cell.innerHTML;
					var	id2=cell2.innerHTML;
					var	id3=cell3.innerHTML;
					document.getElementById("in-put").value=id;
					document.getElementById("in-put2").value=id2;
					document.getElementById("in-put3").value=id3;

				};
			};

			currentRow.onclick = createClickHandler(currentRow);
		}
	}
	window.onload = addRowHandlers();
</script>