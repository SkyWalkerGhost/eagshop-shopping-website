<div class="table-responsive">
    <table class="table table-hover dashboard-task-infos">
        <thead>
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Status</th>
                <th>Manager</th>
                <th> Progress </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>

            @for($i = 1; $i <= 12; $i++)
            <tr>
                <td> {{ $i }} </td>
                <td>Task A</td>
                <td><span class="label bg-green">Doing</span></td>
                <td>John Doe</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                    </div>
                </td>

                <td> 
                    <button class="btn btn-success"> View </button> 
                    <button class="btn btn-primary"> Edit </button> 
                    <button class="btn btn-danger"> Delete </button> 
                </td>
            </tr>
            @endfor

        </tbody>
    </table>
</div>