<div class="container">
    <div class="row">
        <div class="col">
            <input type="hidden" id="page_list" >
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">List</th>
                        {{-- <th scope="col">Type</th> --}}
                        <th scope="col">Amount</th>
                        <th scope="col">Receipt</th>
                    </tr>
                </thead>
                <tbody>
                <?php


                    $total=0;
                ?>
                @foreach ($accounts as $value => $account)
                    <?php
                        if($account->type=='revenue'){
                            $total+=$account->amount;
                            $amount = '+'.$account->amount;
                        }else if($account->type=='expenses'){
                            $total-=$account->amount;
                            $amount = '-'.$account->amount;
                        }

                    ?>
                    <tr>
                        <th width='3%' scope="row">{{ ( $currentPage - 1 ) * $perPage + $value + 1 }}</th>
                        <td width='5%'>{{$account->date}}</td>
                        <td width='25%'>{{$account->list}}</td>
                        {{-- <td>{{$account->type}}</td> --}}
                        <td width='5%'>{{$amount}}</td>
                        <td width='5%'><?php
                            if($account->receipt=='null'){?>
                                    <i class="fas fa-times"></i>
                                <?php
                            }

                        ?></td>
                    </tr>
                @endforeach
                <input type="hidden" id="total" value="<?php echo $total; ?>">
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $accounts->links() }}
        </div>
    </div>
</div>


