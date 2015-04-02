@extends('layouts.master')

@section('content')

<div ng-controller="MyController">
    <b>Invoice:</b>
    <div>
        Quantity: <input type="number" min="0" ng-model="qty">
    </div>
    <div>
        Costs: <input type="number" min="0" ng-model="cost">
    </div>
    <div>
        <b>Total:</b> <span ng-bind="qty * cost | currency"></span>
    </div>

    <ul>
        <li ng-repeat="(key, value) in users">
            <a ng-bind="value.id + ' ' + value.username" ng-click="say(value)"></a>
        </li>
    </ul>

    <div my-customer></div>
</div>

@stop
