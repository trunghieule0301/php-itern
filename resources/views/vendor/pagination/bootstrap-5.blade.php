@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link-1" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link-1" id="myLinkPrevious" name="{{ $paginator->previousPageUrl() }}" onclick="MyFunctionPrevious5();return false;" href="#" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link-1">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link-1">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link-1" id="myLink" href="{{ request()->fullUrlWithQuery(['page' => $page]) }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link-1" id="myLinkNext" name="{{ $paginator->nextPageUrl() }}" onclick="MyFunctionNext5();return false;" href="#" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link-1" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
        <script type="text/javascript">
        function getParameterByName(name, url) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

            function updateQueryStringParameter(uri, key, value) {
                var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
                var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                if (uri.match(re)) {
                    return uri.replace(re, '$1' + key + "=" + value + '$2');
                }
                else {
                    return uri + separator + key + "=" + value;
                }
            }

            function removeURLParameter5(url, parameter) {
            //prefer to use l.search if you have a location/link object
                var urlparts = url.split('?');   
                if (urlparts.length >= 2) {

                    var prefix = encodeURIComponent(parameter) + '=';
                    var pars = urlparts[1].split(/[&;]/g);

                    //reverse iteration as may be destructive
                    for (var i = pars.length; i-- > 0;) {    
                        //idiom for string.startsWith
                        if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                            pars.splice(i, 1);
                        }
                    }
                    return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
                }
                return url;
            }

            function MyFunctionNext5(){ 
                var page = getParameterByName('page', document.getElementById("myLinkNext").name);
                var param = document.getElementById("myLinkNext").name;
                var newUrl = removeURLParameter5(param,'page');
                var currentPage = window.location.href;
                var url = updateQueryStringParameter(currentPage,'page', page);
                location.href = url;
            }

            function MyFunctionPrevious5(){ 
                var page = getParameterByName('page', document.getElementById("myLinkPrevious").name);
                var param = document.getElementById("myLinkPrevious").name;
                var newUrl = removeURLParameter5(param,'page');
                var currentPage = window.location.href;
                var url = updateQueryStringParameter(currentPage,'page', page);
                location.href = url;
            }

            /*
            $('#myLink').click(function(){ 
                MyFunction(); 
                return false; 
            });
            document.getElementById("abc").href="xyz.php"; 
                return false;
            };
            */
        </script>
    </nav>
@endif
