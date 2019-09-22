@extends('dashboard.dashboard_layouts')

@section('title', 'Users')


@section('content')

        <div class="row">
            <div class="col">Users List</div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {  ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $user->fname?></td>
                            <td><?php echo $user->lname?></td>
                            <td><?php echo $user->role?></td>
                        </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


@endsection
