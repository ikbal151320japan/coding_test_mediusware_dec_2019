@extends('layouts.app')

@section('content')
<style type="text/css">
	.form-group {
    margin-bottom: 5px;
}
</style>
	<div class="container-fluid app-body">
		<h3>Recents Posts Sent To Buffer</h3>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group has-search">
				    <span class="fa fa-search form-control-feedback"></span>
				    <input type="text" class="form-control" placeholder="Search" onkeyup="search_txt_field(this)" id='search_txt' autocomplete="off">
				</div>
			</div>
			<div class="col-md-2">
				<input type="" name="" class="form-control" id='datepicker' autocomplete="off" onchange="search_date_field(this)">
			</div>
			<div class="col-md-2">
				<select class="form-control" id='group_type' onchange="search_group_type_field(this)">
					<option value="">All Group</option>
					<option value="upload">Content Upload</option>
					<option value="curation">Content Curation</option>
					<option value="rss-automation">RSS Automation</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top: 5px;">
				<table class="table table-bordered table-hover"> 
					<thead> 
						<tr><th>Group Name</th> <th>Group Type</th> <th>Account Name</th> <th>Post Text</th> <th>Time</th> </tr> 
					</thead> 
					<tbody> 
					@foreach ($posts as $post)
						<tr>
							<td width="350">
								{{ $post->groupInfo->name }}
							</td> 
							<td>
								{{ $post->groupInfo->type }}
							</td> 
							<td>
								<div class="media">
									<div class="media-left">
										<a href="">
											<span class="fa fa-{{$post->accountInfo->type}}"></span>
											<img width="50" class="media-object img-circle" src="{{$post->accountInfo->avatar}}" alt="">
										</a>
									</div>
								</div>
							</td> 
							<td>
								{{ $post->post_text }}
							</td> 
							<td>
								{{ $post->formatDateTime() }}
							</td> 
						</tr>
					@endforeach
					</tbody> 
				</table>
				{{ $posts->links() }}
			</div>
		</div>
	</div>
<script type="text/javascript">

	function search_txt_field(obj)
	{
		var d = new Date($('#datepicker').val());
		var datestring = d.getFullYear() +"-"+(d.getMonth()+1)+"-"+d.getDate();
		search_field_populate_url($(obj).val(),datestring,$('#group_type').val());
	};

	function search_date_field(obj)
	{
		var d = new Date($('#datepicker').val());
		var datestring = d.getFullYear() +"-"+(d.getMonth()+1)+"-"+d.getDate();
		search_field_populate_url($('#search_txt').val(),datestring,$('#group_type').val());
	}

	function search_group_type_field(obj)
	{
		var d = new Date($('#datepicker').val());
		var datestring = d.getFullYear() +"-"+(d.getMonth()+1)+"-"+d.getDate();
		search_field_populate_url($('#search_txt').val(),datestring,$(obj).val());
	}

	function search_field_populate_url(search,date,group_type)
	{
		window.location.href = "./history?search="+search+"&date="+date+"&group_type="+group_type;
		console.log(search+" : " + date + " : " + group_type);
	}
</script>
@endsection