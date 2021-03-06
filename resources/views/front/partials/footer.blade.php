<footer id="footer-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget widget_contact_info">
                    <div class="widget_background">
                        <div class="widget_background__half">
                            <div class="bg"></div>
                        </div>
                        <div class="widget_background__half">
                            <div class="bg"></div>
                        </div>
                    </div>

                    <div class="logo">
                        <img src="/front/assets/images/logo-footer.png" alt="">
                    </div>
                    <div class="widget_content">
                        <p>Sitio Abo, Brgy. Pulong Sampaloc, Doña Remedios Trinidad, Bulakan</p>
                        <p>{{ $company_phone_number }}</p>
                        <a href="#">
                            <span class="__cf_email__" data-cfemail="13707c7d6772706753747c7572613d707c7e">
                                {{ $company_email }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="widget widget_about_us">
                    <h3>About Us</h3>
                    <div class="widget_content">
                        <p>Set 1 km from buses at Baliuag Transit Sub-Terminal, this relaxed, pirate-themed resort is 6 km from events and displays at Bustos Heritage Park and 8 km from cultural attraction Museo ng Baliuag.</p>
                    </div>
                </div>

                <div class="widget widget_categories">
                    <h3>Services</h3>
                    <ul>
                        <li>
                            <a href="{{ route('front.reservation.search') }}">Reservation</a>
                        </li>
                    </ul>
                </div>

                <div class="widget widget_recent_entries">
                    <h3>Useful links</h3>
                    <ul>
                        <li>
                            <a href="{{ route('front.contact') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('front.terms') }}">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="widget">
                    <h3>Operational Hours &amp; Entrance Rates</h3>

                    <div class="widget_content">
                        <table>
                            <thead>
                                <th width="25%">Day</th>
                                <th width="30%">Day hours</th>
                                <th width="30%">Night hours</th>
                                <th width="14%">Adults</th>
                                <th width="14%">Children</th>
                            </thead>
                            <tbody>
                                @foreach($calendar_days as $index => $calendar_day)
                                    @if($calendar_day['active'])
                                        <tr>
                                            <td>{{ $calendar_day['day'] }}</td>
                                            <td>{{ Carbon::parse($calendar_day['day_opening_time'])->format('h:i A').' - '.
                                                    Carbon::parse($calendar_day['day_closing_time'])->format('h:i A') }}</td>
                                            <td>{{ Carbon::parse($calendar_day['night_opening_time'])->format('h:i A').' - '.
                                                    Carbon::parse($calendar_day['night_closing_time'])->format('h:i A') }}</td>
                                            <td>{{ Helper::moneyString($calendar_day['adult_rate']) }}</td>
                                            <td>{{ Helper::moneyString($calendar_day['children_rate']) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="widget widget_follow_us">
                    <div class="widget_content">
                        <p>For special reservation request, please call</p>
                        <span class="phone">{{ $company_phone_number }}</span>
                        <div class="awe-social">
                            <a href="{{ url($company_facebook_url) }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ url($company_twitter_url) }}"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright"><p>&copy {{ config('app.name') }}</p></div>
    </div>
</footer>