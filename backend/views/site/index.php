 <?php
// use kartik\widgets\SideNav;
// OR if this package is installed separately, you can use
use kartik\sidenav\SideNav;
use yii\helpers\Url;
echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    'heading' => $heading,
    'items' => [
        // Important: you need to specify url as 'controller/action',
        // not just as 'controller' even if default action is used.
        //
        // NOTE: The variable `$item` is specific to this demo page that determines
        // which menu item will be activated. You need to accordingly define and pass
        // such variables to your view object to handle such logic in your application
        // (to determine the active status).
        //
        ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site/home', 'type'=>$type]), 'active' => ($item == 'home')],
        ['label' => 'Books', 'icon' => 'book', 'items' => [
            ['label' => '<span class="pull-right badge">10</span> New Arrivals', 'url' => Url::to(['/site/new-arrivals', 'type'=>$type]), 'active' => ($item == 'new-arrivals')],
            ['label' => '<span class="pull-right badge">5</span> Most Popular', 'url' => Url::to(['/site/most-popular', 'type'=>$type]), 'active' => ($item == 'most-popular')],
            ['label' => 'Read Online', 'icon' => 'cloud', 'items' => [
                ['label' => 'Online 1', 'url' => Url::to(['/site/online-1', 'type'=>$type]), 'active' => ($item == 'online-1')],
                ['label' => 'Online 2', 'url' => Url::to(['/site/online-2', 'type'=>$type]), 'active' => ($item == 'online-2')]
            ]],
        ]],
        ['label' => '<span class="pull-right badge">3</span> Categories', 'icon' => 'tags', 'items' => [
            ['label' => 'Fiction', 'url' => Url::to(['/site/fiction', 'type'=>$type]), 'active' => ($item == 'fiction')],
            ['label' => 'Historical', 'url' => Url::to(['/site/historical', 'type'=>$type]), 'active' => ($item == 'historical')],
            ['label' => '<span class="pull-right badge">2</span> Announcements', 'icon' => 'bullhorn', 'items' => [
                ['label' => 'Event 1', 'url' => Url::to(['/site/event-1', 'type'=>$type]), 'active' => ($item == 'event-1')],
                ['label' => 'Event 2', 'url' => Url::to(['/site/event-2', 'type'=>$type]), 'active' => ($item == 'event-2')]
            ]],
        ]],
        ['label' => 'Profile', 'icon' => 'user', 'url' => Url::to(['/site/profile', 'type'=>$type]), 'active' => ($item == 'profile')],
    ],
]); 
?>
<div class="default-index">
    <div class="page-header">
        <h1>Welcome to Gii <small>a magical tool that can write code for you</small></h1>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-4">
            <ul class="list-group">
                <li class="list-group-item active">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                 <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-8">
            <p> Ewan </p>
        </div>
    </div>

    <p class="lead">Start the fun with the following code generators:</p>

    <div class="row">
        <div class="col-lg-4">
            <h3> whatever </h3>
            <p> yeah men </p>
            <p><a class = "btn btn-default" href="http://www.yahoo.com">Tell me more >></a>
        </div>
        <div class="col-lg-4">
            <h3> whatever </h3>
            <p> yeah men </p>
            <p><a class = "btn btn-default" href="http://www.yahoo.com">Tell me more >></a>
        </div>
        <div class="col-lg-4">
            <h3> whatever </h3>
            <p> yeah men </p>
            <p><a class = "btn btn-default" href="http://www.yahoo.com">Tell me more >></a>
        </div>
        <div class="col-lg-4">
            <h3> whatever </h3>
            <p> yeah men </p>
            <p><a class = "btn btn-default" href="http://www.yahoo.com">Tell me more >></a>
        </div>
        <div class="col-lg-4">
            <h3> whatever </h3>
            <p> yeah men </p>
            <p><a class = "btn btn-default" href="http://www.yahoo.com">Tell me more >></a>
        </div>
        <div class="col-lg-4">
            <h3> whatever </h3>
            <p> yeah men </p>
            <p><a class = "btn btn-default" href="http://www.yahoo.com">Tell me more >></a>
        </div>
    </div>

    <p><a class="btn btn-success" href="http://www.yiiframework.com/extensions/?tag=gii">Get More Generators</a></p>

</div>
