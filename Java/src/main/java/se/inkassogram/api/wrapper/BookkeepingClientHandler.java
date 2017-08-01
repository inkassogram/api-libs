package se.inkassogram.api.wrapper;

import se.inkassogram.api.client.BookkeepingClient;

/**
 * Handles an instance of the Bookkeeping client throughout the system.
 *
 * @author bastos
 *
 */
public class BookkeepingClientHandler {

	private static BookkeepingClient client;
	
	/**
	 * Gets a previously instantiated Bookkeeping Client
	 *
	 * @return BookkeepingClient 
	 */
	static BookkeepingClient getClient(){
		if(BookkeepingClientHandler.client == null){
			BookkeepingClientHandler.client = new BookkeepingClient();
		}
		return BookkeepingClientHandler.client;
	}
}
