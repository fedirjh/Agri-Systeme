<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Livraison</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-info text-info" aria-hidden="true"></i>
                    Livraison Info
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0" wire:click="$set('mode', 'list')">
                    <i class="material-icons">arrow_left</i>&nbsp;&nbsp;Back To List
                </button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="row flex-row justify-content-center">
            <div class="col-lg-8  col-12">
                <div class="card-header text-center">
                    <div class="row justify-content-between">
                        <div class="col-md-4 text-start">
                            <h6>
                                Transporteur : {{$transporteur->nom}}
                            </h6>
                            <p class="d-block text-secondary">Tel {{$transporteur->tel}}</p>
                        </div>
                        <div class="col-lg-3 col-md-7 text-md-end text-start">
                            <h6 class="d-block mt-2 mb-0">Agriculteur : {{$agriculteur->nom_prenom}}</h6>
                            <p class="text-secondary">Tel {{$agriculteur->tel}}<br>
                                {{$agriculteur->zone}}<br>
                                {{$agriculteur->region}}
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-md-between">
                        <div class="col-md-4 mt-auto">
                            <h6 class="mb-0 text-start text-secondary font-weight-normal">
                                Invoice no
                            </h6>
                            <h5 class="text-start mb-0">
                                # {{$editId}}
                            </h5>
                        </div>
                        <div class="col-lg-5 col-md-7 mt-auto">
                            <div class="row mt-md-5 mt-4 text-md-end text-start">
                                <div class="col-md-6">
                                    <h6 class="text-secondary font-weight-normal mb-0">Creation date:</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-dark mb-0">{{$cdate->format('Y-m-d')}}</h6>
                                </div>
                            </div>
                            <div class="row text-md-end text-start">
                                <div class="col-md-6">
                                    <h6 class="text-secondary font-weight-normal mb-0">Update date:</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-dark mb-0">{{$mDate->format('Y-m-d')}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table text-right">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="pe-2 text-start ps-2">Ref</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th scope="col" class="pe-2">Qty Livraison</th>
                                        <th scope="col" class="pe-2">Qty Reception</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($entitiesSelected as $item)
                                        <tr>
                                            <td class="text-start text-uppercase" colspan="5">{{$item->ref}}</td>
                                            <td class="ps-4">{{$item->pivot->quantityLivraison}}</td>
                                            <td class="ps-4">{{$item->pivot->quantityReception}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4"></th>
                                        <th class="h5 ps-4">Total</th>
                                        <th colspan="1" class="text-right h5 ps-4">{{$entitiesSelected->sum('pivot.quantityLivraison')}}</th>
                                        <th colspan="1" class="text-right h5 ps-4">{{$entitiesSelected->sum('pivot.quantityReception')}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="card-footer mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-lg-5 text-left">
                            <h5>Thank you!</h5>
                            <p class="text-secondary text-sm">If you encounter any issues related to the
                                invoice you can contact us at:</p>
                            <h6 class="text-secondary font-weight-normal mb-0">
                                email:
                                <span class="text-dark">support@creative-tim.com</span>
                            </h6>
                        </div>
                        <div class="col-lg-7 text-md-end mt-md-0 mt-3">
                            <button class="btn bg-gradient-info mt-lg-7 mb-0" onclick="window.print()" type="button"
                                    name="button">Print
                            </button>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>