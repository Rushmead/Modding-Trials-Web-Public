@extends('layouts.layout')

@section('title', 'Results')

@section('content')
    <div class="container">
        <h2>The Results</h2>
        <p>For all the results go <a href="/results/all">here</a></p>
        <div class="row">
            <div class="col-md-6">
                <h3>Category 1 - Most Original</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Ranking</th>
                            <th>Mod</th>
                            <th>Author(s)</th>
                            <th>Votes</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Lawnmowers</td>
                            <td>iLexiconn & Whalezilla(Team Gorilla)</td>
                            <td>41</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Elemental Dimensions</td>
                            <td>McJty & Elec332(Bit Movers)</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Literal Ascension</td>
                            <td>jamieswhitetshirt</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Goetia</td>
                            <td>Elucent, werty1124, SirShadow & AleixMachina(Team Roots)</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Refraction</td>
                            <td>LordSaad, MrCodeWarrior, Escapee_ & MechWarrior99 (Team Wizardry)</td>
                            <td>18</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Category 2 - Most Visually Pleasing</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Ranking</th>
                            <th>Mod</th>
                            <th>Author(s)</th>
                            <th>Votes</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Bagelsmore The Return</td>
                            <td>SonarSonic</td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Lawnmowers</td>
                            <td>iLexiconn & Whalezilla(Team Gorilla)</td>
                            <td>34</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Elemental Dimensions</td>
                            <td>McJty & Elec332(Bit Movers)</td>
                            <td>29</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Radio Mod</td>
                            <td>sekwha41,GoblinBob,RazzleberryFox & ProfMobius</td>
                            <td>19</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Refraction</td>
                            <td>LordSaad, MrCodeWarrior, Escapee_ & MechWarrior99 (Team Wizardry)</td>
                            <td>17</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Category 3 - Most Useful</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Ranking</th>
                            <th>Mod</th>
                            <th>Author(s)</th>
                            <th>Votes</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Literal Ascension</td>
                            <td>jamieswhitetshirt</td>
                            <td>49</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Radio Mod</td>
                            <td>sekwha41,GoblinBob,RazzleberryFox & ProfMobius</td>
                            <td>21</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lawnmowers</td>
                            <td>iLexiconn & Whalezilla (Team Gorilla)</td>
                            <td>17</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Bagelsmore The Return</td>
                            <td>SonarSonic</td>
                            <td>13</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Tesla Essentials</td>
                            <td>Tjkenmate, Blynd3, Bread10 & Tacomundo12 (Mod Squad)</td>
                            <td>9</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Vote Totals</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Ranking</th>
                            <th>Mod</th>
                            <th>Author(s)</th>
                            <th>Votes</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Lawnmowers</td>
                            <td>iLexiconn & Whalezilla (Team Gorilla)</td>
                            <td>92</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Literal Ascension</td>
                            <td>jamieswhitetshirt</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Bagelsmore The Return</td>
                            <td>SonarSonic</td>
                            <td>61</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Elemental Dimensions</td>
                            <td>McJty & Elec332(Bit Movers)</td>
                            <td>57</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Radio Mod</td>
                            <td>sekwha41,GoblinBob,RazzleberryFox & ProfMobius</td>
                            <td>55</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection