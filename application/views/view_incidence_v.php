<style>
	.reportCase {
		height: 80%;
		margin: 0 auto;
		padding: 20px;
		background: #DDD;
		width: 70%;
	}


</style>
<div class="reportCase">
	<form action="<?php echo base_url() . 'c_incident/updateIncident';?>" method="post">
		<legend>
			Incident Details
		</legend>
		<input type="hidden" name="summary_id" id="summary_id" />
		<input type="hidden" name="incident_id" id="incident_id" />
		<div style="width:50%;">
			<div id="Category" style="float:left;">
				<label>Incident Type</label>
				<select name="incident_type"  id="incident_type" style="height: 2.5em">
					<option value="0">--Select One--</option>
					<?php
					foreach ($incident_types as $incident_type) {
						echo "<option value='" . $incident_type['incident_type_id'] . "'>" . $incident_type['incident_type_name'] . "</option>";
					}
					?>
				</select>
			</div>
			<div id="Location" style="float:right;">
				<label>Place of Incidence</label>
				<select style="height:2.5em;" name="location" id="location">
					<option value="0" >--Select Place--</option>
					<?php
					foreach ($constituencies as $constituency) {
						echo "<option value='" . $constituency['constituency_id'] . "'>" . $constituency['constituency_name'] . "</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div id="email" style="clear:both;">
			<label>Claimant's Name</label>
			<input type="text" name="full_name" id="full_name" style="height: 2.5em;width:50%;" required="required" />
		</div>
		<div style="width:50%;">
			<div id="Location" style="float:left;">
				<label>County</label>
				<select style="height:2.5em;" id="county" name="county">
					<option value="0" >--Select County--</option>
					<?php
					foreach ($counties as $county) {
						echo "<option value='" . $county['county_id'] . "'>" . $county['county_name'] . "</option>";
					}
					?>
				</select>
			</div>
			<div id="Location" style="float:right;">
				<label>Constituency</label>
				<select style="height:2.5em;" name="constituency" id="constituency">
					<option value="0" >--Select Constituency--</option>
					<?php
					foreach ($constituencies as $constituency) {
						echo "<option value='" . $constituency['constituency_id'] . "'>" . $constituency['constituency_name'] . "</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div id="date" style="width:50%;clear:both;">
			<label>Date of Reporting</label>
			<input type="text" name="dor" id="dor" style="height: 2.5em" required="required"/>
		</div>
		<div id="magnitude" >
			<label>Police Station</label>
			<select style="height:2.5em;" name="station" id="station">
				<option value="0" >--Select Police Station--</option>
				<?php
				foreach ($stations as $station) {
					echo "<option value='" . $station['station_id'] . "'>" . $station['station_name'] . "</option>";
				}
				?>
			</select>
		</div>
		<div id="drdescription">
			<label>Incident Description</label>
			<textarea name="description" id="description">
			
		   </textarea>
		</div>
		<div id="button">
			<input type="submit" value="Update" class="btn"/>
		</div>
	</form>
</div>
<?php 
foreach($results as $result){
	
}
?>
<script type="text/javascript">
	$(document).ready(function() {
		//Attach date picker for date of reporting
		$("#dor").datepicker({
			yearRange : "-120:+0",
			maxDate : "0D",
			dateFormat : $.datepicker.ATOM,
			changeMonth : true,
			changeYear : true
		});
	
		$("#incident_type").val("<?php echo $result['ss_incident_type']; ?>");
		$("#location").val("<?php echo $result['ss_location_id']; ?>");
		$("#full_name").val("<?php echo $result['security_reporter_contact']; ?>");
		$("#county").val("<?php echo $result['ss_county_id']; ?>");
		$("#constituency").val("<?php echo $result['ss_constituency_id']; ?>");
		$("#dor").val("<?php echo $result['security_dor']; ?>");
		$("#station").val("<?php echo $result['ss_station_id']; ?>");
		$("#description").val("<?php echo trim($result['security_incident_description']); ?>");	
		$("#summary_id").val("<?php echo $result['ss_id'];?>");
		$("#incident_id").val("<?php echo $result['security_incident_id'];?>");
	});

</script>
