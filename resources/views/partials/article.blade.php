@php( $search_tags = display_search_keywords( get_the_ID() ) )

@if (get_post_format( $p->ID ) === 'image')
    <div class="pt-1 cf-article" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} display:inline-block; overflow:scroll">
        <a data-toggle="modal" data-target=".image-zoom">
            @php(the_content())
            {{ the_title()}}
        </a>
        <!-- Modal -->
        <div class="modal fade image-zoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content text-center">
                    @php(the_content())
                </div>
            </div>
        </div>
    </div>
@else
    <div class="p-1 cf-article" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} display:inline-block; overflow:scroll">
        @php( the_content() )
        {{ the_title()}}
    </div>
@endif
