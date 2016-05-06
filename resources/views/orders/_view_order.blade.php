<table class="table">
		<tr>
			<td> C/No </td>
			<td> {{ $result->c_number }} </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td> {{ $result->from_city['name'] }} </td>
			<td> To </td>
			<td> {{ $result->to_city['name'] }} </td>
			<td> Date </td>
			<td> {{ date('d-m-Y', strtotime($result->date)) }} </td>

		</tr>

		<tr>
			<td> Consignor </td>
			<td> {{ $result->consignor }} </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td> No of Packages </td>
			<td> {{ $result->no_of_packages }} </td>

			<td> Weight </td>
			<td> {{ $result->weight }} Kg</td>

			<td> 
				<table class="table">
					<tr>
						<td> Freight Charge </td>
						<td> {{ $result->freight_charge }} </td>
					</tr>
					<tr>
						<td> Insurance Charge </td>
						<td> {{ $result->insurance_charge }} </td>
					</tr>
					<tr>
						<td> S.C. Charge </td>
						<td> {{ $result->sc_charge }} </td>
					</tr>
					<tr>
						<td> Grand Total </td>
						<td> {{ $result->grand_total }} </td>
					</tr>
					@if($result->paid === 'yes')
					<tr>
						<td> <strong>PAID</strong> </td>
					</tr>
					@else
					<tr>
						<td> <strong>UNPAID</strong> </td>
					</tr>
					@endif
				</table>
			</td>
		</tr>

		<tr>
			<td> Consignee </td>
			<td> {{ $result->consignee }} </td>
		</tr>

		
</table>