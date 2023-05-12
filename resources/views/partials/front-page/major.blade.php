{{-- <section class="major">
    <div class="title major-pfs">
        @php
            $taxonomy = 'categories_portfolio';
            $terms = get_terms( $taxonomy, array ( 'parent' => 0, 'hide_empty' => false, 'order' =>'ASC', 'orderby' => 'date') );
        @endphp
        @foreach( $terms as $term )
            
                 <h2>{{ $term -> name}}</h2>
        @endforeach
    </div>
    <div class="content major-pfs">
        @php
            $taxonomy = 'categories_portfolio';
            $terms = get_terms( $taxonomy, array ( 'parent' => 0, 'hide_empty' => false, 'order' =>'ASC', 'orderby' => 'date') );
            $count=0;
        @endphp

        @foreach( $terms as $term )
            @php
            $count++;
            $termID = $term->term_id;
            $termchildren = get_terms( $taxonomy, ['child_of'=>$termID, 'parent'=>$termID, 'hide_empty' => false ]);
            @endphp
            <div class="tab-{{$count}}">
                <ul>
                        @foreach ( $termchildren as $children)
                            @php
                                $term_link = get_term_link( $children->slug, 'categories_portfolio' )
                            @endphp
                            <li><a href="{{ $term_link }}">{{$children->name}}</li></a>
                        @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</section> --}}

<section class="major">
    <div class="title major-pfs">
        @php
            $count=0;
            $taxonomy = 'categories_portfolio';
            $terms = get_terms( $taxonomy, array ( 'parent' => 0, 'hide_empty' => false, 'order' =>'ASC', 'orderby' => 'date') );
        @endphp
        @foreach( $terms as $term )
            <div class="major-item">
                <div class="major-title">
                    <h2>{{ $term -> name}}</h2>
                </div>
                 
                
                    @php
                        $count++;
                        $termID = $term->term_id;
                        $termchildren = get_terms( $taxonomy, ['child_of'=>$termID, 'parent'=>$termID, 'hide_empty' => false ]);
                    @endphp
                <div class="major-content tab-{{$count}}">
                    <ul>
                        @foreach ( $termchildren as $children)
                            @php
                                $term_link = get_term_link( $children->slug, 'categories_portfolio' )
                            @endphp
                            <li><a href="{{ $term_link }}">{{$children->name}}</li></a>
                        @endforeach
                    </ul>
                </div>
        </div>
        @endforeach
    </div>
</section>