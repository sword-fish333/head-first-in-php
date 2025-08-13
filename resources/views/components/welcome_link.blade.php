<li class="flex items-center gap-4 py-2 relative {{ $linkIndex < count($tab['links']) - 1 ? 'before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute' : '' }}">
                                        <span class="relative py-1 bg-white dark:bg-[#161615]">
                                            <span
                                                class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                                <span
                                                    class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                            </span>
                                        </span>
    <span>
                                            <a href="{{ $link['link'] }}"
                                               class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433]">
                                                <span>{{ $link['page'] }}</span>
                                                @include('partials._link_icon')
                                            </a>
                                        </span>
</li>
