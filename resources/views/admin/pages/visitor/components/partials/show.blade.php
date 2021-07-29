<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show_{{ $loop->iteration }}">
    <i class="fa fa-eye icon-size"></i>
</button>

<div class="modal fade bd-example-modal-lg" id="show_{{ $loop->iteration }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> 
                    დეტალები 
                </h5>
            </div>
        
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> Region Name </th>
                            <th scope="col"> Page URL </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td> {{ $visitor->region_name }} </td>
                            <td> 
                                <a href="#">
                                    {{ $visitor->page_url }}
                                </a> 
                            </td>
                            
                        </tr>
                    </tbody>

                </table>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    დახურვა
                </button>
            </div>
        </div>
    </div>
</div>
