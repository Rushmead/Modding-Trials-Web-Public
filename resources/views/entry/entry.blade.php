@extends('layouts.layout')

@section('title', 'Enter!')

@section('content')
    <div class="container" ng-controller="EntryController">
        <center>
            <h2>Welcome to the The Modding Trial's entry form!</h2>
            <h3>Click one of the buttons below!</h3>
            <h3>Enter as a</h3>
            <div class="buttons">
                <button class="btn btn-success" ng-click="individual()">Individual</button>
                <button class="btn btn-success" ng-click="team()">Team</button>
            </div>
            <hr>
            <div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)">{[{alert.msg}]}</div>
            <form ng-submit="indSubmit()" id="indForm">
                <div class="individual ngFade" ng-hide="!isIndividual">
                    <h3>Individual Entry Form</h3>
                    <br>
                    <label>Username *:</label> <input type="text" ng-model="formData.username"
                                                      ng-class="validData.username" class="form-control shortInput">
                    <label>Email *:</label> <input type="text" ng-model="formData.email" ng-class="validData.email"
                                                   class="form-control shortInput">
                    <label>Github or other SCM where source will be hosted *:</label> <input
                            ng-model="formData.source" ng-class="validData.source" type="text"
                            class="form-control shortInput">
                    <label>Stream URL:</label> <h6 style="margin-top:0;">If your going to be streaming</h6><input
                            ng-model="formData.indStream" type="text" class="form-control shortInput">
                    <div class="checkboxes">
                        <label>Do you, {[{formData.username}]}, agree to allowing the Modding Trials to distribute
                            and use the mod you create for the time frame that the event is on?</label><br>
                        <input type="radio" name="use"value="yes" ng-model="formData.use.yes" ng-class="validData.useYes">Yes
                        <input type="radio" name="use"value="no" ng-model="formData.use.no">No
                    </div>
                    <div class="checkboxes">
                        <label>Do you, {[{formData.username}]}, agree to the rules of The Modding Trials?</label><br>
                        <input type="radio" name="rules"  value="yes" ng-model="formData.rules.yes" ng-class="validData.rulesYes">Yes
                        <input type="radio" name="rules" value="no" ng-model="formData.rules.no">No
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Enter!</button>
                </div>
                <div class="individual ngFade" ng-hide="!isTeam">
                    <h3>Team Entry Form</h3>
                    <br>
                    <label>Members *:</label> <h6 style="margin-top:0;">Maximum of 4, each name seperated by a comma</h6><input type="text" ng-model="formData.members"
                                                      ng-class="validData.members" class="form-control shortInput">
                    <label>Email *:</label> <input type="text" ng-model="formData.email" ng-class="validData.email"
                                                   class="form-control shortInput">
                    <label>Team Name *:</label> <input type="text" ng-model="formData.teamName" ng-class="validData.teamName"
                                                   class="form-control shortInput">
                    <label>Github or other SCM where source will be hosted *:</label> <input
                            ng-model="formData.source" ng-class="validData.source" type="text"
                            class="form-control shortInput">
                    <label>Stream URL:</label> <h6 style="margin-top:0;">If your going to be streaming, If there are multiple streams you can use a multistream link</h6><input
                            ng-model="formData.indStream" type="text" class="form-control shortInput">
                    <div class="checkboxes">
                        <label>Do you agree to allowing the Modding Trials to distribute
                            and use the mod you create for the time frame that the event is on?</label><br>
                        <input type="radio" name="use"value="yes" ng-model="formData.use.yes" ng-class="validData.useYes">Yes
                        <input type="radio" name="use"value="no" ng-model="formData.use.no">No
                    </div>
                    <div class="checkboxes">
                        <label>Do you agree to the rules of The Modding Trials?</label><br>
                        <input type="radio" name="rules"  value="yes" ng-model="formData.rules.yes" ng-class="validData.rulesYes">Yes
                        <input type="radio" name="rules" value="no" ng-model="formData.rules.no">No
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Enter!</button>
                </div>
            </form>
        </center>
    </div>
    <!-- /.container -->
@endsection
@section('javascript')
    <script src="/assets/js/controllers/EntryController.js" type="text/javascript"></script>
@endsection