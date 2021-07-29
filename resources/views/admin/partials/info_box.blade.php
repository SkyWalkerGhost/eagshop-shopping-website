<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-pink hover-expand-effect">
        <div class="icon">
            <i class="material-icons">playlist_add_check</i>
        </div>
        <div class="content">
            <div class="text"> პროდუქცია </div>
            <h4> {{ number_format($productCount) }} </h4>
            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon" style="margin-top: -10px;">
            <i class="material-icons"> ₾ </i>
        </div>
        <div class="content">
            <div class="text"> მთლიანი ფასი </div>
            <h4> {{ number_format($totalPrice) }} </h4>
            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-light-green hover-expand-effect">
        <div class="icon">
            <i class="material-icons">forum</i>
        </div>
        <div class="content">
            <div class="text"> პროდუქციის რაო. </div>
            <h4> {{ number_format($totalProduction) }} </h4>
            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">person_add</i>
        </div>
        <div class="content">
            <div class="text"> მომხმარებლები </div>
            <h4> {{ number_format($numberOfShopUser) }} </h4>
            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="content">
            <div class="text"> კატეგორია </div>
            <h4> {{ number_format($numberOfCategory) }} </h4>
            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="fa fa-eye"></i>
        </div>
        <div class="content">
            <div class="text"> ვიზიტორები </div>
            <h4> {{ number_format($visitorCount) }} </h4>
            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>