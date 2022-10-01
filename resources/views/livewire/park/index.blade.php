<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">

        <div class="col-12">
            <div class="card my-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Liste Des Transaction</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">{{count($transactions)}}</span> Total
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                                    data-name="agriculteurs-agri" data-type="csv" type="button"
                                    name="button"><i class="material-icons text-sm">file_download</i>&nbsp;&nbsp;Export</button>
                            <button class="btn btn-outline-primary btn-sm print mb-0 mt-sm-0 mt-1"
                                    data-name="agriculteurs-agri" type="button"
                                    name="button"><i class="material-icons text-sm">print</i>&nbsp;&nbsp;Print</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center"  id="datatable-search">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-4">
                                ID
                            </th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Name
                            </th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Status
                            </th>

                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Entry
                            </th>

                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Exit
                            </th>
                        </tr>
                        </thead>
                        <tbody wire:poll="updateComponent">
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td class="text-sm font-weight-normal align-middle ps-4">
                                        {{$transaction->id}}
                                    </td>
                                    <td class="align-middle text-sm ps-2">
                                        <p class="text-sm font-weight-bold mb-0">
                                            {{ $transaction->transporteur->nom}}
                                        </p>
                                    </td>
                                    <td class="align-middle text-sm ps-2">
                                        <p class="text-sm font-weight-bold mb-0">
                                            {{ $transaction->status }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-sm ps-2">
                                        <p class="text-sm font-weight-bold mb-0">
                                            {{ $transaction->entry_time }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-sm ps-2">
                                        <p class="text-sm font-weight-bold mb-0">
                                            {{ $transaction->exit_time }}
                                        </p>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

