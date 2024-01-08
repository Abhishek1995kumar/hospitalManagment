<style type="text/css" media="print">
	@page {
		size: auto;   /* auto is the initial value */
		margin: 0mm;  /* this affects the margin in the printer settings */
		size: portrait;			
	}
</style>


	<div class='mp' style='font-size:12px;margin:10px;font-family:Times New Roman'>
		<div class="row">
			<table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
				<caption class="text-center"><h5><b style="border:solid black;border-width:1px 1px 1px 1px;padding: 5px;">Tax Invoice</b></h5>
				</caption>
				<tr>
					 <td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  2px;">
						 <img src="{{URL::asset('assets/img/logo-red-black.png')}}" class="front-header-logo" alt="logo" style="width:95px;height:45px;" class="image"> 
					</td>
					<td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  2px;">
						<p style="text-align: center;border:solid black;border-width:0px 0px 0px 0px;padding: 0px;margin: 0px;">
							<font size="5"><b>CONTACARE OPTHALMIC PVT.LTD.<!-- CONTACARE EYE HOSPITAL --></b></font><br/>
							<font size="3">(UNIT OF CONTACARE OPTHALMIC PVT.LTD.)</font><br/>
							<font size="2">
                                <h6>Netaji Subhash Road, Neptune Uptown,Mulund, Thane, Maharashtra, 400080, India</h6>
                                telephone no- &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
								<!-- <br/>
							Tel- 25342747 / 64158235 / 65295174<br/>
							Email - eyevam2009@yahoo.co.in -->
						</p>
					</td>
				</tr>
			</table>
			<table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
				<tr>
					<td style="border:solid black;border-width:0px 0px 0px 0px;"><b> Date :</b> <?=date('d-m-Y',strtotime($contacts->mr_admission_date));?></td>
					<td style="border:solid black;border-width:0px 0px 0px 0px;">
						<?php
							if($contacts->mr_discharge_date != '0000-00-00 00:00:00')
							{
						?>
							<b> Date Of Discharge :</b> <?=date('d-m-Y',strtotime($contacts->mr_discharge_date));?>
						<?php
							}
						?>
					</td>
					
				</tr>
				<tr>

				 <td style="border:solid black;border-width:0px 0px 0px 0px;"><b>Hospitl Invoice NO :</b> 
						<?=$contacts->invoice_no;?>.
					</td>

					
                   <td style="border:solid black;border-width:0px 0px 0px 0px;"><b>Patient Name :</b> 
						<?=$contacts->patientname;?>.
					</td>
					
					
					<td  style="border:solid black;border-width:0px 0px 0px 0px;"><b>Doctor : DR.</b> <?=$contacts->doctorname;?></td>
				</tr>
				
				  <tr>
						<td colspan="4" style="border:solid black;border-width:0px 0px 0px 0px;"><b>Procedure:</b> <?=$contacts->procedure;?></td>
						
					</tr>
		</table>
		<table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
				<tr>
					<th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
						SR.No
					</th>
					<th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width:60%;">
						Particulars
					</th>
					<th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
						HSN Code
					</th>
					<th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 20%;">
						Amount
					</th>

				</tr>
				
					<tr>
						<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
							
						</td>
						<td  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
							
						</td>
						<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
						
						</td>
						<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
							
						</td>
						
					</tr>
				<?php
					
				?>
				<tr>
					<td style="border:solid black;border-width:1px 1px 1px 1px;">
						
					</td>
					<td colspan="2" class='text-right' style="border:solid black;border-width:1px 1px 1px 1px;">
						Sub Total :
					</td>
					<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
						
					</td>
					
				</tr>
				<tr>
					<td style="border:solid black;border-width:1px 1px 1px 1px;">
						
					</td>
					<td colspan="2" class='text-right' style="border:solid black;border-width:1px 1px 1px 1px;">
						Discount :
					</td>
					
					
				</tr>
				<tr>
					<td style="border:solid black;border-width:1px 1px 1px 1px;">
						
					</td>
					<td colspan="2" class='text-right' style="border:solid black;border-width:1px 1px 1px 1px;">
						GST  :
					</td>
					<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
						0
					</td>
					
				</tr>
				<tr>
					<td style="border:solid black;border-width:1px 1px 1px 1px;">
						
					</td>
					<td colspan="2" class='text-right' style="border:solid black;border-width:1px 1px 1px 1px;">
						Net Total :
					</td>
					<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
						
					</td>	
				</tr>

				<tr>
					<td style="border:solid black;border-width:1px 1px 1px 1px;"></td>
					
					<td colspan="2" class='text-right' style="border:solid black;border-width:1px 1px 1px 1px;">
						  Amount Paid :
					</td>
					
					<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
						
					</td>					
				</tr>

				<tr>
					<td style="border:solid black;border-width:1px 1px 1px 1px;"></td>

					<td colspan="2" class='text-right' style="border:solid black;border-width:1px 1px 1px 1px;">
						Balance :
					</td>
				</tr>

				<tr>
					<td colspan="4" class='text-left' style="border:solid black;border-width:0px 0px 0px 0px;">
						<table class='table' style='width:100%;margin:0 auto;border-color: black;padding: 0px;' frame="box">
							<caption class="text-center no-padding" style="color: black;"  ><b>Payment Received</b></caption>
							<tr>
								<th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
									Payment Mode
								</th>
								<th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
									Payment Type
								</th>
								<th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
									Payment Date
								</th>
								<th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
									Remark
								</th>
								<th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
									Amount
								</th>
							</tr>
					
									</td>
									<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
										 <?=date("d-m-Y");?>
									</td>
									<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
										1234
									</td>
									<td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
										123456
									</td>
								</tr>
							<?php
								
							?>
						</table>
					</td>
					
					
				</tr>
				<tr>
					
					<td colspan="4" class='text-left' style="border:solid black;border-width:0px 0px 0px 0px;">
						 Created By : 
						 <?php
						 	
						 ?>
					</td>
					
					
				</tr>
				<tr>
					
					<td colspan="2" class='text-left' style="border:solid black;border-width:0px 0px 0px 0px;">
						 Reporting Time : <?=date('H:i:s',strtotime($contacts->updated_at))?>
					</td>
					
					<td colspan="2" class='text-right' style="border:solid black;border-width:0px 0px 0px 0px;">
						 Authorised Signatory
					</td>
				</tr>
			</table>
			
		</div>
		
	</div>	