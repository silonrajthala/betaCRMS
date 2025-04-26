<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Form Name</th>
												<th>View/Get Data</th>
												<th>Create</th>
												<th>Edit Button</th>
												<th>Update</th>
												<th>Delete</th>
											
												
                                                
											</tr>
										</thead>
										<tbody>
                                        @foreach($formList as $m)
                                            <tr>
                                                <td>{{$m}}</td>
                                                <td>
                                                    @php 
                                                     if(isset($allowed[$m.'_V']) && $allowed[$m.'_V']=='Y')
                                                      $check='checked';
                                                     else
                                                      $check='';
                                                    @endphp
                                                    <div class="form-check form-switch">
										            <input class="form-check-input permission_chk" value="{{$m.'_V'}}" type="checkbox" id="flexSwitchCheckDefault" {{$check}}>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php 
                                                     if(isset($allowed[$m.'_I']) && $allowed[$m.'_I']=='Y')
                                                      $check='checked';
                                                     else
                                                      $check='';
                                                    @endphp
                                                    <div class="form-check form-switch">
										            <input class="form-check-input permission_chk" value="{{$m.'_I'}}" type="checkbox" id="flexSwitchCheckDefault" {{$check}}>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php 
                                                     if(isset($allowed[$m.'_E']) && $allowed[$m.'_E']=='Y')
                                                      $check='checked';
                                                     else
                                                      $check='';
                                                    @endphp
                                                    <div class="form-check form-switch">
										            <input class="form-check-input permission_chk" value="{{$m.'_E'}}" type="checkbox" id="flexSwitchCheckDefault" {{$check}}>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php 
                                                     if(isset($allowed[$m.'_U']) && $allowed[$m.'_U']=='Y')
                                                      $check='checked';
                                                     else
                                                      $check='';
                                                    @endphp
                                                    <div class="form-check form-switch">
										            <input class="form-check-input permission_chk" value="{{$m.'_U'}}" type="checkbox" id="flexSwitchCheckDefault" {{$check}}>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php 
                                                     if(isset($allowed[$m.'_D']) && $allowed[$m.'_D']=='Y')
                                                      $check='checked';
                                                     else
                                                      $check='';
                                                    @endphp
                                                    <div class="form-check form-switch">
										            <input class="form-check-input permission_chk" value="{{$m.'_D'}}" type="checkbox" id="flexSwitchCheckDefault" {{$check}}>
                                                    </div>
                                                </td>
                                               

                                            </tr>

                                            @endforeach
											
										</tbody>
									</table>