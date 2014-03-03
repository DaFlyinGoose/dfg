<main>
    <ul id="sortable">
        @foreach ($groups as $group)
            <li class="ui-state-default" id='{{ $group->id }}'><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $group->group }}</li>
        @endforeach
    </ul>

    <button id='save'>Save</button>
</main>