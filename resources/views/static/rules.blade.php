@extends('layouts.layout')

@section('title', 'About')

@section('content')
    <div class="container">
      <h1><u>THE RULES!</u></h1>
        Rules:
        <ul>
        <li>All code must be written within the creation time frame.</li>
        <li>Code authored before the event can not be used, unless included as part of an approved library.</li>
        <li>All mods must be visible source on GitHub or another source control alternative.</li>
        <li>Mods must be compatible with each other. Mods that crash on startup or maliciously tamper with other mods may be disqualified.</li>
        </ul>
        Mod Requirements:
        <ul>
            <li>Mods must be compatible with MC 1.10.2 and latest minecraft version. Mods must also be Java 8 compliant.</li>
            <li>All code must be written during the creation period of the event.</li>
            <li>All assets (texture/sound/models) must be created during the creation period OR based on works in the public domain.</li>
            <li>Code should be commited to GitHub or an alternative source control service at least once a day.</li>
            <li>Only approved API will be permitted. Requests for approved libraries can be made here</li>
        </ul>
        <h1><u>Allowed Libraries</u></h1>
        <ul>
            Languages:
            <li><a href="http://www.scala-lang.org/">Scala</a></li>
            <li><a href="https://kotlinlang.org/">Kotlin</a></li>
            <li><a href="http://www.groovy-lang.org/">Groovy</a></li>
            <li><a href="http://golo-lang.org">Golo</a></li>

            <br>Java Libraries:
            <li><a href="http://jgroups.org/">JGroups</a></li>
            <li><a href="http://akka.io/">Akka</a></li>
            <li><a href="http://www.javazoom.net/javalayer/javalayer.html">JLayer</a></li>

            <br>Energy Libraries:
            <li><a href="https://minecraft.curseforge.com/projects/tesla">Tesla</a></li>
            <li><a href="http://teamcofh.com/docs/redstone-flux/">RedstoneFlux API</a></li>

            <br>Misc Libraries:
            <li><a href="https://minecraft.curseforge.com/projects/llibrary">LLibrary</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/shadowmc">ShadowMC</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/guide-api">Guide API</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/mantle">Mantle</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/bookshelf">Bookshelf</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/bookshelf-api-library">BookshelfAPI</a></li>
            <li><a href="https://github.com/Abastro/StellarAPI">StellarAPI</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/mcmultipart">MCMultipart</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/the-one-probe">The One Probe</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/zen-model-loader">Zen Model Loader</a></li>
            <li><a href="https://github.com/thecbproject/codechickenlib/">CodeChickenLib</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/reborncore">RebornCore</a></li>
            <li><a href="http://jenkins.ic2.player.to/job/IC2_110/">IC2</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/cyclops-core">Cyclops Core</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/thedragoncore">The Dragon Core</a></li>
            <li><a href="https://github.com/elytra/MovingWorld/tree/1.10">Moving World</a></li>
            <li><a href="https://github.com/TeamWizardry/LibrarianLib">Librarian Lib</a></li>
            <li><a href="https://minecraft.curseforge.com/projects/eleccore-rendering-library">ElecCore</a></li>
        </ul>
    </div>
    <!-- /.container -->
@endsection