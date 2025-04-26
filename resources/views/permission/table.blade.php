<div class="table-responsive">
    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="fixed-header">Modules Name</th>
                @foreach($usertype as $li)
                    <th class="fixed-header">{{$li->typename}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $m)
                <tr>
                    <td class="fixed-column">{{$m->modulename}}</td>
                    @foreach($usertype as $li)
                        <td>
                            @php 
                                if(isset($allowed[$m->id.'_'.$li->id]))
                                    $check='checked';
                                else
                                    $check='';
                            @endphp
                            <div class="form-check form-switch">
                                <input class="form-check-input permission_chk" value="{{$m->id.'_'.$li->id}}" type="checkbox" id="flexSwitchCheckDefault" {{$check}}>
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
    /* Custom CSS for fixed table header and first column */
.table-responsive {
    overflow-x: auto;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
}

.table-responsive .fixed-header {
    position: sticky;
    top: 0;
    background: white;
    z-index: 1;
}

.table-responsive .fixed-column {
    position: sticky;
    left: -12px;
    background: white;
    z-index: 1;
    box-shadow: 1px 0 1px rgba(0, 0, 0, 0.1); 
}

</style>
