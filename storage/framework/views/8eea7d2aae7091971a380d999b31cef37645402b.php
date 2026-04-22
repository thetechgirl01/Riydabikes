<?php $__env->startSection('title', 'Terms'); ?>



<?php $__env->startSection('content'); ?>


    <!-- End Header -->

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(temp/front/assets/img/banner/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>TRADING CONDITIONS</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        
                        <li class="active">Trading Conditions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-10 col-md-offset-1">
 <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
							<div class="section-heading text-center">
                            <h2><?php echo e($settings->site_name); ?> Trading Conditions</h2>
                           <h5> The following terms and conditions form an integral part of your agreement with <?php echo e($settings->site_name); ?> and shall be read carefully; <?php echo e($settings->site_name); ?> does not bear any liability for clients who fail to comply with them. For more information, please contact us. </h5><br>
                        </div>
                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                           Market Watch
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                             <?php echo e($settings->site_name); ?> Broker strives to ensure that the market watch is accurate and prices are obtained from several major banks/liquidity providers/exchanges; in case of closure/failure of one or more price provider for any or all CFDs, quotes will be provided which will reflect what the company thinks to be the current Bid and Ask price for each CFD; we do not guarantee that our prices are the best prices available on the world market.<br><br>

                                                The Client agrees hereunder that our market watch is only an indicator of the current world market and any misunderstanding regarding this service must be returned to <?php echo e($settings->site_name); ?> Operations data.<br><br>

                                                Moreover, charts for all traded instruments are drawn according to the default spreads, and may differ from the prices displayed on the market watch according to your account type because of differences in markups.
                                           
										   </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                           Spread
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                           <?php echo e($settings->site_name); ?> Broker offers clients competitive spreads on all instruments, but may rarely make small increases on some or all instruments; ensuring that it provides the best available market conditions and tightest spreads, since one of our most important objectives is to ensure that your orders are executed at the best market price and that you get the tightest spreads available.
                                            
											</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                             Hedging
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                          <?php echo e($settings->site_name); ?> allows clients to open positions in the opposite direction of previously opened positions in the trading account, to reduce loss and to decide later when to enter the market.<br><br>

                                                Hedging an instrument by its corresponding Future OTC contract is forbidden (for swap-free accounts), because this represents an attempt to take advantage of the swap free facility and gain profits from swaps, one direction of this kind of hedge must be closed immediately. If the client fails to take action to avoid such practices, <?php echo e($settings->site_name); ?> will, unfortunately, be required to close or take other action (by deducting the swaps retroactively or any other means) on these accounts without further notice.<br><br>

                                                Hedged positions will be held in the trading account without affecting the required margin value, since the required margin is calculated for each instrument according to the net positions opened at a specific moment.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                                           Order Types
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        <strong>The following orders may be given by the client:</strong> <br>

                                                * OPEN - to open a new position; <br><br>

                                                * CLOSE - to close an open position; <br><br>

                                                * PARTIAL CLOSE - to close a part of an open position at the current market price and keep the remaining lots (part) floating. <br><br>

                                                * MODIFY - to add, remove, edit orders for Stop Loss, Take Profit, Buy Limit, Buy Stop, Sell Limit, Sell Stop. <br><br>

                                                * CLOSE BY - in case hedging is allowed. <br><br>

                                                * Multiple close - to close-hedged positions on a specific instrument <br><br>

                                                * Market orders - orders sent from the client terminal either by the client himself or a plug-in hooked to the client terminal (Expert Advisor), to buy or to sell an instrument at the current market price displayed on the market watch. <br><br>

                                                * Pending orders - this kind of order can be set in the same way used for market orders; but at prices predicted by the trader and may be achieved in the future, like limit, stop, and entry orders. <br><br>

                                                * All pending orders are guaranteed according to the fair market value. <br><br>

                                                * All pending orders are good till cancelled (GTC), unless the client places an expiry time and date on entry orders, or in the event that the financial instrument expires. <br><br>

                                                * All pending orders must be placed with respect to the rules appearing in the contract specifications for each instrument.<br><br>

                                                * Once pending orders are in the process, the system will reject any cancellation or modification attempted during that time. <br><br>

                                                * Pending order conditions may vary during hectic market conditions. <br><br>

                                                * If the market opens with a break off after a weekend or holidays, upon release of important economic and political news, or in the case of force majeure events; orders (sell stop, buy stop, stop loss) are fulfilled at the first available prices in the market. <br><br>

                                                * Even though such situations are not frequent, please be cautious when leaving pending orders for weekends and holidays.<br><br>

                                                * Placing stop orders prior to the release of financial news is not permitted, such orders may be rejected, deleted or filled at the best available market prices at that time.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac5">
                                            Futures - OTC
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                       All future trades are classified as market orders, and will be executed according to the market prices provided from its corresponding exchange at the time of execution; in addition, exchange fees may apply. <br><br>

                                                Rollover: Futures-OTC contracts will not be rolled over automatically, neither accepting rollover requests from clients; in the case of any client need to rollover a future-otc position/s, open positions on the current contract can be closed and reopened at the next nearby future-otc contract before the last trading day for each contract. Available Futures instruments: <br><br>

                                                * Indices <br>
                                                * Commodities <br>
                                                * Energies <br><br>

                                                Where margin, contract size, and general contract specifications are displayed in the Markets Section of the website, and updated periodically.
                                           </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac6">
                                            Leverage
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       Shall mean a ratio in respect of Transaction Size and Initial Margin, 1:100 ratio means that in order to open a position, the Initial Margin required is one percent of the original contract value. <br><br>

                                                The 1 (one) standard lot size is the measurement unit specified for each CFD contract. The possible choice of a leverage rate ranges from 1:1 up to 1:500 depending on the type of the CFD, the amount of trading volume active in the account and at the Company's discretion. At the opening of the Client Account, the leverage rate is set at 1:30 by default. The Client may change the leverage of his Client Account by contacting the Company. The Company has the right to allow a change to the Client Account leverage at the Company's discretion. In addition, the Company may, at its discretion, change the Client Account Leverage without any prior notice to the Client.  <br><br>

                                                Regardless of your account type or the amount of equity you have in your account, the leverage you will be allocated to trade with will be determined by the amount of trading volume you have in active use at any given time.  <br><br>

                                                The default leverage on all accounts is 1:30 based on CySEC regulation. Higher leverage will be available only upon client's request and will be executed at our sole discretion.  <br><br>

                                                Professional accounts will be handled individually and may not follow the above leverage rules.  <br><br>

                                                Utilizing a high level of leverage may extend your trading possibilities and lead to larger gains as well as higher risks; risks might be reduced by following a strict trading strategy at the opening and closure of your transactions. For further information, please talk to a Live Support Representative, or view details in the Contact Us page.
                                            
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->  <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac7">
                                          Margin Requirements
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                     The client must abide the rules as declared on the <?php echo e($settings->site_name); ?> broker corporate website Contract Specification section for each CFD, including the margin requirements; and the Client shall provide and maintain the Initial Margin within such limits as the Company, at its sole discretion, may determine, set, or update. <br><br>

                                                It is the Client's responsibility to ensure that he understands how a Margin is calculated. <br><br>

                                                <?php echo e($settings->site_name); ?> has the right to amend any entry in the Contract Specifications section for each CFD including margin requirements, and these changes may take effect on both new and existing/open positions/trades; which may be declared through an internal mail message or on the company's corporate website; unless a Force Majeure Event has occurred. <br><br>

                                                In case of a Force Majeure Event, <?php echo e($settings->site_name); ?> has the right to change Margin requirements without prior written notice to the Client. In this situation, the Company has the right to apply new Margin requirements to new positions and to positions which are already open. <br><br>

                                                If the Equity to Margin (necessary margin) ratio falls below 5% at any time, <?php echo e($settings->site_name); ?> has the right to close any or all of the Client's open positions without the Client's consent or any prior written notice. In order to determine if the Client has breached this clause, any sums referred to therein which are not denominated in the Currency of the Client Account shall be treated as if they were denominated in the currency of the Client Account by converting them into the currency of the Client Account at the relevant exchange rate for spot dealings in the foreign exchange market. <br><br>

                                                The Client is responsible for notifying the Company as soon as he believes that he will be unable to meet a Margin payment when due. <br><br>

                                                The Company has no obligation to make Margin Calls for the Client. <br><br>

                                                Where the Company effects or arranges a transaction involving an instrument, the Client should note that, depending upon the nature of the transaction, he may be liable to make further payments when the transaction fails to be completed or upon the earlier settlement or closing out of his position. He may be required to make further variable payments by way of Margin against the purchase price of the instrument, instead of paying (or receiving) the whole purchase (or sale) price immediately. A movement in the market price of the Client's investment will affect the amount of margin payment he will be required to make. The Client agrees to pay the Company on demand such sums by way of margin as are required from time to time under the rules of any relevant Market (if applicable) or as the Company may, at its discretion reasonably require for the purpose of protecting itself against loss or risk of loss on present, future or contemplated transactions under this Agreement.
                                            
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                           <!-- Single Item -->  <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac8">
                                          Slippage
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac8" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                    Slippage involves executing any given trade on a specific price different from the expected price sent or preset by the client. This may take place during highly volatile market conditions such (but not limited to) economic or political news; the order will be filled at the next best available market price because, but not limited to - the desired/preset order price is not available, or because higher spread differences are applied in the corresponding exchanges of the traded instrument. <br><br>

                                                <?php echo e($settings->site_name); ?> does not apply slippage under normal market conditions, and applies it on stop pending entry or liquidation orders during times when <?php echo e($settings->site_name); ?> is closed or when - but not limited to - there is a weekend or bank holiday, international economic events or hectic market movements. In this case, stop orders will be filled on the opening price which <?php echo e($settings->site_name); ?> finds suitable. <br><br>

                                                Clients acknowledge that slippage might occur as per the liquidity providers’ terms and conditions and that this is beyond the control of <?php echo e($settings->site_name); ?> Limited and agrees to waive <?php echo e($settings->site_name); ?> from any liability that may arise subjective to any damage or expense or loss incurred by the Client, in relation to or directly or indirectly arising from but not limited to such terms and conditions.
                                             </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                           <!-- Single Item -->  <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac9">
                                          Delivery
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac9" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                     Physical acquisition by the client of any traded CFD at a specific delivery point worldwide. <br><br>

                                                <?php echo e($settings->site_name); ?> does not offer delivery for any position held, opened or closed at the trading platform
                                                
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                           <!-- Single Item -->  <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac10">
                                           Scalping
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac10" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                    Scalping is a trading strategy through which the trader (Scalper/Pip Hunter) attempts to take advantage of small price moves and narrow ranges by making many transactions on small price changes over a small time frame. <br><br>

                                                Scalping is allowed on variable spread account types. Please refer to our account types table account types table <br><br>

                                                However, <?php echo e($settings->site_name); ?> does not permit scalping on Fixed spread account types (Classic account). In case <?php echo e($settings->site_name); ?> classifies a Classic account holder as a scalper or a pip hunter, the company may, at its sole discretion, and without a prior written notice, take one of the following actions: <br><br>

                                                * Change the account type to the corresponding variable spread account type <br>

                                                * Terminate this Agreement <br>

                                                * Close out all or any of the Client's open positions at current market prices <br>

                                                * Debit the Client Trading Account(s) for the amounts which are due to the Company <br>

                                                * Close any or all of the Client Trading Accounts held with the Company <br>

                                                * Combine Client Trading Accounts; consolidate the Balances in such Client Accounts and offset those Balances <br>

                                                * Refuse to open new Client Trading Accounts for the Client
                                           
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                           <!-- Single Item -->  <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac11">
                                           PIP Hunting
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac11" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                      Shall refer to the situation in which the Client opens a position and closes it in a very short time, usually trading incorrect spikes in the market, or taking advantage of feed indicative prices. <br><br>

                                                <?php echo e($settings->site_name); ?> has the right to take any necessary actions similar to scalping clients, at its sole discretion, and without any prior written notice to protect itself since this action is prohibited.
                                           
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                           <!-- Single Item -->  <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac12">
                                         News Trading
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac12" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                      <?php echo e($settings->site_name); ?> allows placing market orders before or during financial news releases. <br><br>

                                                However, placing stop orders prior to the release of financial news is not permitted, such orders may be rejected, deleted or filled at the best available market prices at that time.
                                           
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac13">
                                         Phone Orders
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac13" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                      <?php echo e($settings->site_name); ?> allows trading via phone in case of emergencies; all telephone calls placed through the Dealing Desk are recorded by our recording system; records are kept for 10 days. All conversations concerning price quote requests, order placement and execution, confirmations, and any other trading related issues, are also generally recorded to ensure fairness and accuracy for all parties involved in the delivery and execution of a trading order. <br><br>

                                                <strong>Instructions for placing an order with the dealing desk by phone:</strong><?php echo e($settings->whatsapp); ?> <br><br>

                                                * Call the Dealing Desk. <br>
                                                * Once the telephone is answered, have the following information ready for the dealer who has answered your call: <br>

                                                1. Your Trading account number <br>
                                                2. Your password (for security purposes) <br>
                                                3. Your order details
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac14">
                                         Expert Advisors and Trailing Stops (EA / TS)
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac14" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                      <strong>The Expert Advisor and Trailing Stop facilities are activated by default. They must not violate any trading conditions listed, and in addition, the following conditions apply:</strong> <br><br>

                                                * Scalping clients can be used only on variable spread accounts <br><br>

                                                * The client must use the EA in a reasonable manner. All EA users in the fixed spread accounts must not use the EA for frequent trading at news time. Users must understand that by using the EA frequently at news time, they prevent other clients from executing a fair trade. <br><br>

                                                * The Company bears no responsibility when the Client uses additional functionalities of the client trading terminal such as Trailing Stop and/or Expert adviser, which are executed completely under the client’s responsibility, as they depend directly on his trading terminal and the Company bears no responsibility whatsoever. In case where the Company suspects that a Client is using additional functionalities /plug-ins where it affects the reliability and/or smooth operation and/or orderly of the Company’s Trading Platform the Company has the right to terminate the agreement or to cancel/delete those transactions. <br><br>

                                                * The Company will not be liable for any loss or expense incurred by the Client in connection with, or directly or indirectly arising from the acts, omissions or negligence of any third party or any third party software including, but not limited to, Expert advisors, signal providers, social trading platforms, and virtual private network.
                                           
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac15">
                                         Trading Hours
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac15" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                       <?php echo e($settings->site_name); ?> Clients can execute trades 24 hours a day from 00:05 on Monday until 23:30 on Friday (Cyprus Time), except for some instruments which halt at different times such as a break; the trading schedules and more specific information on each instrument is available through our website or within the MT4 platform. We are required to perform maintenance on our servers each night from 23:58 to 00:02 EET ( Eastern European Time ). During this time all trading is halted on the platform.
                                        </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac16">
                                          Execution
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac16" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                         <?php echo e($settings->site_name); ?> offers one type of order execution (Market execution) on all account types for corporate and individuals. All orders are filled according to the fair market value.
                                            </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac17">
                                         System Failure
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac17" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                           In case of system failure, which may result in a failure to execute an order according to client instructions or failure to execute an order at all; whether it was a scheduled routine system maintenance or server update, or an emergent disconnection by power or network failure or any other reason; clients are kindly advised to contact the dealing desk for any enquiries.
                                            
											</p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac18">
                                        Inducement
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac18" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                          The client acknowledges that from time to time the Company might pay a fee, commission or provide non-monetary benefits to third parties, in addition to the normal fees and commissions paid by the client. The client agrees that a reference fee may be paid to certain business consultants and introducers who introduce new clients to the Company and help to conclude and maintain the relationship between the Company and these clients. The client accepts that such inducements may be calculated based on several criteria, as for example, according to the trading volume of the client or the hits from the website and/or other digital media channels. Further information on the fee, commission, non-monetary benefit can be provided by the Company upon the client’s request.
                                            </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac19">
                                        Trailer Note
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac19" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        <?php echo e($settings->site_name); ?> has the right to amend, change, delete, add, and modify spreads, fees, commissions, leverage, account type, margin requirements, liquidation level (stop out level) and any offers for any accounts or any positions, at any time without a prior notice. <br><br>
 
                                                The latest published version of this policy on the English mirror of the company's website shall prevail. <br><br>

                                                These terms are an essential part of the customer trading agreement. Should any clause in the trading policy conflict with a clause or clauses in the customer trading agreement, the clauses herein shall prevail. <br><br>

                                                Amendments in case of a force majeure event shall be applied without prior notice
                                           </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac20">
                                         Inactive/Dormant Accounts
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac20" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        <?php echo e($settings->site_name); ?> has the right to amend, change, delete, add, and modify spreads, fees, commissions, leverage, account type, margin requirements, liquidation level (stop out level) and any offers for any accounts or any positions, at any time without a prior notice. <br><br>
 
                                                The latest published version of this policy on the English mirror of the company's website shall prevail. <br><br>

                                                These terms are an essential part of the customer trading agreement. Should any clause in the trading policy conflict with a clause or clauses in the customer trading agreement, the clauses herein shall prevail. <br><br>

                                                Amendments in case of a force majeure event shall be applied without prior notice
                                           </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item --> <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac21">
                                         Inactive/Dormant Accounts
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac21" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                         Any account(s), held with <?php echo e($settings->site_name); ?>, without any trading activity and/or accounts that are inactive and or remain non-operational and/or holding zero balance/equity for a period of six (6) months and more, are considered by <?php echo e($settings->site_name); ?> to be Dormant accounts. <br><br>

                                                Such dormant accounts will be subject to relevant charge/cost(s), relating to the maintenance/administration of such accounts. When an account is classified as dormant <?php echo e($settings->site_name); ?> has the right to charge an ‘inactivity fee’ of 20 USD, 20 EUR, 20 GBP or 20 PLN (depending on the base currency of the account holder) per month, which will be charged and debited from the balance of the specific account until the account holder has the required funds available and/or until a zero balance/equity is reached. Such an ‘inactivity fee’ shall not in any case give a minus balance to the account. <br><br>

                                                Any Dormant account which continues to be dormant for a total period of twelve (12) months, is considered to be Closed on the first day after twelve (12) months of no transactions. <br><br>

                                                Both Dormant and Closed accounts will be frozen immediately, and the account holder will not be permitted to undertake any further transaction in such Dormant or Closed account. <br><br>

                                                In order for a Dormant or Closed account to be re-activated the account holder shall proceed with <?php echo e($settings->site_name); ?>' KYC/CDD procedures and by funding his account and conducting at least one (1) trade with the Company.
                                             </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            
                           
                        </div>
                    </div>                  

				  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/home/trading.blade.php ENDPATH**/ ?>